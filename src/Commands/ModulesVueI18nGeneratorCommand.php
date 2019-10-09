<?php


namespace GoraPiotr\ModulesVueI18nGenerator\Commands;


class ModulesVueI18nGeneratorCommand extends GenerateInclude
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module-vue-i18n:generate {--umd} {--multi} {--with-vendor} {--file-name=} {--lang-files=} {--format=es6} {--multi-locales}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create output translations i18n js file for vue.";

    /**
     * Execute the console command.
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        $this->info("Process is starting...");
        parent::handle();
        $this->info('Run js wrapper');
        $this->runJsWrapper();
        $this->info("i18n file has been generated successfully!");
    }

    private function runJsWrapper(): void
    {
        $filePath = base_path() . config('vue-i18n-generator.jsFile');

        exec("cd " . __DIR__ . "/../Scripts && node i18n-wrapper.js " . $filePath);
    }
}
