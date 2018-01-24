<?php
/*
//Eingebener Titel
$title = $_POST['title'];

//Das Verzeichniss in dem die Bilder gespeichert werden sollen
$directory = 'images/';

//Die Endung der Datei(png,jpg etc)
$extension = pathinfo(basename($_FILES['userFile']['name']), PATHINFO_EXTENSION);

//geht über jedes File im angegebenen verzeischnis
$filesInDirectory = new FilesystemIterator($directory);
//anzahlt der Files +1
$counter = iterator_count($filesInDirectory) + 1;

// setzt die Datei mit dem Counter und der extension(jpg,png etc) zusammen
$file = $directory . $counter . '.' . $extension;

//speichert die datei im Verzeichen + neuem Datei Namen ($file)
move_uploaded_file($_FILES['us rFile']['tmp_name'], $file);
*/
class FileProcessing
{
    private $title;
    private $directory = 'images/';
    private $tmpFileDirectory;
    private $extension;
    private $fileName;
    private $counter;
    private $newFileName;

    function __construct()
    {
        $this->getTitle();
        $this->getFileName();
        $this->getExtension();
        $this->getTmpFileDirectory();
        $this->countOfFilesInDirectory();
        $this->fuseDirectoryWithNewName();
        $this->saveFileToNewDirectory();
    }

    private function getTitle(){
        $this->title = $_POST['title'];
    }
    public function viewTitle(){
        echo $this->title;
    }

    private function getFileName() {
        $this->fileName = basename($_FILES['userFile']['name']);
    }

    private function getExtension(){
        $this->extension = pathinfo($this->fileName, PATHINFO_EXTENSION);
    }
    private function getTmpFileDirectory(){
        $this->tmpFileDirectory = $_FILES['userFile']['tmp_name'];
    }

    private function countOfFilesInDirectory() {
        $filesInDirectory = new FilesystemIterator($this->directory);
        $this->counter = iterator_count($filesInDirectory) + 1;
    }

    private function fuseDirectoryWithNewName() {
        $this->newFileName = $this->directory . $this->counter . '.' . $this->extension;
    }

    public function viewNewFileName(){
        echo $this->newFileName;
    }

    private function saveFileToNewDirectory() {
        move_uploaded_file($this->tmpFileDirectory, $this->newFileName);
    }


}




