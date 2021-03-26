<?php

namespace App\Command;

use App\Entity\Game;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class StudentsNameLoadCommand extends Command
{
    private EntityManagerInterface $manager;
    private string $dataDirectory;
    private SymfonyStyle $io;
    private int $template_game_id;

    public function __construct(
        EntityManagerInterface $manager,
        string $dataDirectory,
        int $template_game_id
    )
    {
        $this->manager = $manager;
        $this->dataDirectory = $dataDirectory;
        $this->template_game_id = $template_game_id;

        parent::__construct();
    }

    protected static $defaultName = 'app:students-name-load';
    protected static $defaultDescription = 'import students\' name';

    protected function configure() : void
    {
        $this
            ->setDescription(self::$defaultDescription)
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output) : void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->setStudentName();
        return Command::SUCCESS;
    }

    private function getDataFromFile(): array
    {
        $file = $this->dataDirectory . 'students_name.csv';

        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        $normalizers = [new ObjectNormalizer()];

        $encoders = [
            new CsvEncoder()
        ];

        $serializer = new Serializer($normalizers, $encoders);

        /**
         * @var string $fileString
         */
        $fileString =  file_get_contents($file);

        return $serializer->decode($fileString, $fileExtension);
    }

    private function setStudentName(): void
    {
        $template_students = $this->manager->getRepository(Student::class)->findBy([
            'game' => $this->manager->getRepository(Game::class)->find($this->template_game_id)
        ]);

        $names = $this->getDataFromFile();

        foreach ($template_students as $student)
        {
            $student->setName($names[rand(0,99)]['name']);
            $this->manager->persist($student);
        }

        $this->manager->flush();
    }
}
