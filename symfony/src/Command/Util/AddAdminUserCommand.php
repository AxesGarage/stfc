<?php

namespace App\Command\Util;

use App\Command\BaseCommand;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'util:add-admin-user',
    description: 'Add an admin user to the project',
)]
class AddAdminUserCommand extends BaseCommand
{
    private UserPasswordHasherInterface $hasher;
    private EntityManagerInterface $entityManager;

    public function __construct(UserPasswordHasherInterface $hasher, EntityManagerInterface $entityManager) {
        parent::__construct();
        $this->hasher = $hasher;
        $this->entityManager = $entityManager;
    }

    protected function configure(): void {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // prompt for inputs
        $helper = $this->getHelper('question');
        $question = new Question('Please enter the email address for the new user: ');

        $email = $helper->ask($input, $output, $question);

        //validate that there is not already a user with that email

        $question = new Question('Please enter the first name of the new user: ');
        $firstName = $helper->ask($input, $output, $question);
        $question = new Question('Please enter the last name of the new user: ');
        $lastName = $helper->ask($input, $output, $question);
        $question = new Question('Please enter the password of the new user: ');
        $question->setHidden(true);
        $question->setHiddenFallback(false);
        $password = $helper->ask($input, $output, $question);

        $user = new User();
        $user->setEmail($email)
            ->setPassword($this->hasher->hashPassword($user, $password))
            ->setRoles(['ROLE_ADMIN'])
            ->setFirstName($firstName)
            ->setLastName($lastName);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('The new admin user has been created');

        return Command::SUCCESS;
    }
}
