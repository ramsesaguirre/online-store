<?php

    namespace App\Console\Commands;

    use Doctrine\DBAL\DriverManager;
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;

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
    }
