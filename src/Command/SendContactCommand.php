<?php


namespace App\Command;


use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use App\Service\ContactService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendContactCommand extends Command
{

    private $contactRepository;
    private $mailer;
    private $contactService;
    private $userRepository;
    protected static $defaultName = 'app:send-contact';
    public function __construct(
        ContactRepository $contactRepository,
        ContactService $contactService,
        MailerInterface $mailer,
        UserRepository $userRepository
    )
    {
        $this->contactService = $contactService;
        $this->contactRepository = $contactRepository;
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
        parent::__construct();
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $toSend= $this->contactRepository->findBy(['isSend'=> false]);
        ##$adress =  new Address($this->userRepository->getOwner()->getEmail,$this->userRepository->getOwner()->getName);
        foreach ($toSend as $mail){
            $email=(new Email())->from($mail->getEmail())
                ->to(new Address('owner@example.com'))
                ->subject( 'New message from '.$mail->getName())
                ->text($mail->getMessage());
            $this->mailer->send($email);
            $this->contactService->isSend($mail);

        }
        return Command::SUCCESS;
    }
}