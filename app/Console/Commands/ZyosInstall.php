<?php

    namespace App\Console\Commands;

    use App\Products;
    use App\User;
    use Doctrine\DBAL\DriverManager;
    use Faker\Factory;
    use Illuminate\Console\Command;
    use Illuminate\Support\Str;

    /**
     * Class ZyosInstall
     *
     * @package App\Console\Commands
     */
    class ZyosInstall extends Command {

        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'zyos:install {environment=dev} {--remove=false}';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Instalación Base de Proyecto';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct() {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return mixed
         * @throws \Doctrine\DBAL\DBALException
         */
        public function handle() {

            $this->output->title('Instalación de Aplicación');
            $env = in_array(mb_strtolower($this->argument('environment')), ['dev', 'prod']) ? mb_strtolower($this->argument('environment')) : 'dev';

            $database =  config("database.connections.mysql.database");
            $drop = sprintf('DROP SCHEMA IF EXISTS %s', $database);
            $create = sprintf('CREATE DATABASE IF NOT EXISTS %s', $database);

            $connection = $this->getConnection();
            $schema = $connection->getSchemaManager();

            if($env == 'dev'):
                if(in_array($database, $schema->listDatabases())):
                    $connection->executeQuery($drop);
                    $this->output->text(sprintf('[1] <info>Base de datos</info> <comment>%s</comment> <info>eliminada</info>', $database));
                    $connection->executeQuery($create);
                    $this->output->text(sprintf('[2] <info>Base de datos</info> <comment>%s</comment> <info>creada</info>', $database));

                else:
                    $this->output->text(sprintf('[1] <info>Base de datos</info> <comment>%s</comment> <info>eliminada</info>', $database));
                    $connection->executeQuery($create);
                    $this->output->text(sprintf('[2] <info>Base de datos</info> <comment>%s</comment> <info>creada</info>', $database));
                endif;
            endif;

            $this->output->newLine();
            $this->call('migrate');
            $this->output->newLine();
            $this->output->text(sprintf('[3] <info>Migraciones en la base de datos</info> <comment>%s</comment> <info>ejecutada</info>', $database));
            $this->getLoadFixtures($env);
            $this->output->text(sprintf('[4] <info>Fixtures en la base de datos</info> <comment>%s</comment> <info>ejecutada en modo %s</info>', $database, $env));
            $this->output->newLine();

            $this->output->success('Proceso Terminado');
        }

        /**
         * @param null $database
         * @return \Doctrine\DBAL\Connection
         * @throws \Doctrine\DBAL\DBALException
         */
        private function getConnection($database = null) {

            $params = [
                'dbname' => $database,
                'user' => config("database.connections.mysql.username"),
                'password' => config("database.connections.mysql.password"),
                'host' => config("database.connections.mysql.host"),
                'driver' => 'pdo_mysql',
            ];

            return DriverManager::getConnection($params);
        }

        /**
         * @param string|null $env
         */
        private function getLoadFixtures(?string $env) {

            if($env == 'dev'):
                $this->getFixtureDev();
            else:

            endif;
        }

        /**
         * Faker
         */
        private function getFixtureDev() {

            $faker = Factory::create('es_ES');

            /**
             * Usuario
             */
            $entity = new User();
            $entity->name = $faker->name;
            $entity->email = 'TEST@TEST.COM';
            $entity->password = bcrypt(123);
            $entity->save();

            /**
             * Productos
             */
            for ($i = 1; $i <= 5; $i++):
                $entity = new Products();
                $entity->name = $faker->company;
                $entity->slug = Str::slug($entity->name);
                $entity->description = $faker->text(400);
                $entity->price = $i * 100;
                $entity->is_active = true;
                $entity->save();
            endfor;
        }
    }
