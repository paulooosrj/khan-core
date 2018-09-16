<?php

namespace Command;

use Symfony\Component\Console\Command\Command as Comando;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BackupCommand extends Comando {

	public function Zip($source, $zip) {

		if ($source === ".env" || $source === "composer.json") {
			$rootDir = str_replace('src/Khan/KhanCli', '', __DIR__);
			$zip->addFile($rootDir . $source, $source);
			return $zip;
		}

		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator($source),
			\RecursiveIteratorIterator::LEAVES_ONLY
		);

		foreach ($files as $name => $file) {
			// Skip directories (they would be added automatically)
			if (!$file->isDir()) {
				// Get real and relative path for current file
				$rootDir = str_replace('src/Khan/KhanCli', '', __DIR__);
				$filePath = str_replace($rootDir, '', $file->getRealPath());
				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}

		return $zip;

	}

	protected function configure() {

		$this->setName('backup')
			->addArgument('dir', InputArgument::OPTIONAL, 'Aonde voce deseja salvar o seu novo backup?')
			->setDescription('Backup my project.')
			->setHelp('Backup in application...');

	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		$pasta = ($input->getArgument('dir')) ? $input->getArgument('dir') : "./";

		KhanCommand::shell("rm -rf backup.zip");

		$zip = new \ZipArchive();

		if (!$zip->open($pasta, \ZIPARCHIVE::CREATE)) {
			return false;
		}

		// Initialize archive object
		$zip = new \ZipArchive();
		$zip->open('backup.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

		$appZip = $this->Zip('app', $zip);
		$configZip = $this->Zip('config', $appZip);
		$publicZip = $this->Zip('public', $configZip);
		$resourcesZip = $this->Zip('resources', $publicZip);
		$envZip = $this->Zip('.env', $resourcesZip);
		$composerZip = $this->Zip('composer.json', $envZip);

		$composerZip->close();

	}

}
