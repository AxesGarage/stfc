<?php

namespace App\Controller;

use App\Utils\Stfc\Alliance;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class StfcController extends AbstractController {

    #[Route('/', name: 'app_index')]
    public function index(KernelInterface $kernel): Response {
        $stfc_data = Yaml::parseFile($kernel->getProjectDir() . '/data/stfc.yaml');
        return $this->render('index.html.twig', [
            'data' => $stfc_data,
            'week_number' => (new \DateTime())->format('W')
        ]);
    }
    #[Route('/api/territory/{server}/{alliance}', name: 'app_territory_api_redirect')]
    public function territoryApiRedirect(int $server, string $alliance): RedirectResponse {
        return $this->redirectToRoute('app_territory_api',[
            'server' => $server,
            'alliance' => $alliance,
            'week' => (new \DateTime())->format('W')
        ]);
    }

    #[Route('/api/territory/{server}/{alliance}/{week}', name: 'app_territory_api')]
    public function territoryApi(int $server, string $alliance, int $week, KernelInterface $kernel): JsonResponse {
        $stfc_data = Yaml::parseFile($kernel->getProjectDir() . '/data/stfc.yaml');

        if(!isset($stfc_data[$server])) throw $this->createNotFoundException("Server: {$server} has not data");
        $server_data = $stfc_data[$server];

        $alliance = strtoupper($alliance);
        if(!isset($server_data['Alliances'])) throw $this->createNotFoundException("The server data has no alliance information");

        $alliances = array_reduce($server_data['Alliances'], function($result, $data) use ($week) {
            $territories = array_filter(array_map('trim', $data['Territories']));
            $result[$data['Alliance']] = new Alliance($data['Alliance'], $data['Status'], $territories, $week);
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
