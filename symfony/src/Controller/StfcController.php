<?php

namespace App\Controller;

use App\Utils\Stfc\Alliance;
use App\Utils\Stfc\Status;
use App\Utils\Stfc\Territory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Yaml\Yaml;

class StfcController extends AbstractController {

    #[Route('/stfc/', name: 'app_stfc_index')]
    public function index(KernelInterface $kernel): Response {
        $stfc_data = Yaml::parseFile($kernel->getProjectDir() . '/data/stfc.yaml');
        return $this->render('stfc/index.html.twig', [
            'data' => $stfc_data,
            'week_number' => (new \DateTime())->format('W')
        ]);
    }

    #[Route('/stfc/ctrl', name: 'app_stfc_ctrl')]
    public function ctrl(KernelInterface $kernel): Response {
        $stfc_data = Yaml::parseFile($kernel->getProjectDir() . '/data/stfc.yaml');

        /** @var Alliance[] $alliances */
        $alliances = array_reduce($stfc_data[63]['Alliances'], function($result, $data) {
            $territories = array_filter(array_map('trim', $data['Territories']));
            $status = $data['Status'] ?? Status::ALLIANCE_STATUS_NEUTRAL;
            $result[$data['Alliance']] = new Alliance($data['Alliance'], $status, $territories);
            return $result;
        }, []);


        $allyAlliances = array_filter($alliances, function($alliance){ return $alliance->isAlly(); });

        $allyTerritories = [];
        foreach ($allyAlliances as $ally){
            foreach($ally->getTerritories() as $territory) {
                $allyTerritories[] = [
                    'name' => $ally->getName(),
                    'territory' => $territory
                ];
            }
        }

        uasort($allyTerritories, function ($a, $b) {
            return ($a['territory']->getTime() < $b['territory']->getTime()) ? -1 : 1;
        });

        return $this->render('stfc/ctrl.html.twig', [
            'data' => $stfc_data,
            'alliance' => $alliances['CTRL'],
            'allies' => $allyAlliances,
            'allyTerritories' => $allyTerritories,
            'week_number' => (new \DateTime())->format('W')
        ]);
    }

    #[Route('/stfc/api/territory/{server}/{alliance}', name: 'app_territory_api_redirect')]
    public function territoryApiRedirect(int $server, string $alliance): RedirectResponse {
        return $this->redirectToRoute('app_territory_api',[
            'server' => $server,
            'alliance' => $alliance,
            'week' => (new \DateTime())->format('W')
        ]);
    }

    #[Route('/stfc/api/territory/{server}/{alliance}/{week}', name: 'app_territory_api')]
    public function territoryApi(int $server, string $alliance, int $week, KernelInterface $kernel): JsonResponse {
        $stfc_data = Yaml::parseFile($kernel->getProjectDir() . '/data/stfc.yaml');

        if(!isset($stfc_data[$server])) throw $this->createNotFoundException("Server: {$server} has not data");
        $server_data = $stfc_data[$server];

        $alliance = strtoupper($alliance);
        if(!isset($server_data['Alliances'])) throw $this->createNotFoundException("The server data has no alliance information");

        $alliances = array_reduce($server_data['Alliances'], function($result, $data) use ($week) {
            $territories = array_filter(array_map('trim', $data['Territories']));
            $status = $data['Status'] ?? Status::ALLIANCE_STATUS_NEUTRAL;
            $result[$data['Alliance']] = new Alliance($data['Alliance'], $status, $territories, $week);
            return $result;
        }, []);

        if(!isset($alliances[$alliance])) throw $this->createNotFoundException("The Alliance {$alliance} was not found");
        if(count($alliances[$alliance]->getTerritories()) === 0){
            throw $this->createNotFoundException("The alliance '{$alliance}' does not have any defined territory");
        }

        return $this->json([
            'server_name' => $server_data['name'],
            'server' => $server,
            'alliance' => $alliances[$alliance],
            'week_number' => $week
        ]);
    }
}
