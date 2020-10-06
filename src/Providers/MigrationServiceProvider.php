<?php


namespace AbdallhSamy\Helpers\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom($this->getMigrationFolders('migrations'));
    }

    public function getMigrationFolders($path = '', $folders = [])
    {
        $migrationPath = database_path() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR;
        foreach (array_diff(scandir(database_path($path)), ['.', '..']) as $folder) {

            if (is_dir(database_path($path . DIRECTORY_SEPARATOR . $folder))) {
                $folders[] = $folder;
                foreach ($this->getMigrationFolders($path . DIRECTORY_SEPARATOR . $folder) as $subFolder) {
                    $folders[] = $folder . DIRECTORY_SEPARATOR . $subFolder;
                }
            }

        }
        // end of loop
        if ($path == 'migrations') {
            foreach ($folders as $index => $folder) {
                $folders[$index] = $migrationPath . $folder;
            }
        }
        return $folders;
    }
}
