<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exportar la estructura de la base de datos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $list_tablas="pedidos productos clientes detalles_pedido";

        $path = storage_path('database_structure.sql');
        $path1 = storage_path('database_structure_clear.sql');
        $dbName = env('DB_DATABASE');
        $command = "mysqldump -u " . env('DB_USERNAME') . " -p" . env('DB_PASSWORD') . " -h " . env('DB_HOST') . " --compact --skip-comments --no-data $dbName $list_tablas > $path";
        exec($command);
        if ($this->isSedAvailable())
            exec("sed '/^\/\*!40101/d ; s/ ENGINE=.*;//' $path > $path1");

        $this->info("Database structure exported to: " . $path);
    }
    public function isSedAvailable()
    {
        $output = null;
        $resultCode = null;

        // Ejecuta el comando 'sed --version' y captura la salida y el código de resultado
        exec('sed --version', $output, $resultCode);

        // Si el código de resultado es 0, 'sed' está disponible
        return $resultCode === 0;
    }
}
