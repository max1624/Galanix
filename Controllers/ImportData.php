<?php

namespace Controllers;
use Models\Data;

class ImportData extends \App\Controller
{
    private $save;
    public function index ()
    {
        return $this->render('ImportData');
    }
    public function saveFile()
    {
        if(isset($_FILES) && $_FILES['inputfile']['error'] == 0)
        { // Проверяем, загрузил ли пользователь файл
            $path = $_FILES['inputfile']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if ($ext != "csv")
            {
                echo "Wrong extension!";
            }
            else
            {
                $destination_dir = "import" .'/'.$_FILES['inputfile']['name']; // Директория для размещения файла
                $filename = $_FILES['inputfile']['name'];
                move_uploaded_file($_FILES['inputfile']['tmp_name'], $destination_dir ); // Перемещаем файл в желаемую директорию
                //TODO: сделать проверку на существование файлв

                $this->save = new Data();
                if ($this->save->saveCSV($filename))
                {
                    return $this->render('FileUploaded');
                }
                else
                {
                    return $this->render('FileIsNotUploaded');
                }

            }

        }

    }
    public function clear()
    {
        $this->save = new Data();
        $this->save->clearTable();
        return $this->render('Clear');
    }
    public function show()
    {
        $this->save = new Data();

        $params = $this->save->show();
        return $this->render('ViewResult', $params );
    }

}