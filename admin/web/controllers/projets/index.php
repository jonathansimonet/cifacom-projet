<?php

/*
 * This file is part of the CRUD Admin Generator project.
 *
 * Author: Jon Segador <jonseg@gmail.com>
 * Web: http://crud-admin-generator.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


require_once __DIR__.'/../../../vendor/autoload.php';
require_once __DIR__.'/../../../src/app.php';

use Symfony\Component\Validator\Constraints as Assert;



function youtube_id_from_url($url) {
    $pattern =
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
    ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}

function daylimotion_id_by_url($url){
    $media_url = "";
    preg_match('#<object[^>]+>.+?http://www.dailymotion.com/swf/video/([A-Za-z0-9]+).+?</object>#s', $url, $matches);
    if(!isset($matches[1])) {
        preg_match('#http://www.dailymotion.com/video/([A-Za-z0-9]+)#s', $url, $matches);
        if(!isset($matches[1])) {
            preg_match('#http://www.dailymotion.com/embed/video/([A-Za-z0-9]+)#s', $url, $matches);
            if(strlen($matches[1])){ $media_url = $matches[1]; }
        }elseif(strlen($matches[1])){
            $media_url = $matches[1];
        }
    }elseif(strlen($matches[1])){
        if(strlen($matches[1])){ $media_url = $matches[1]; }
    }

    return $media_url;
}

$app->match('/projets/list', function (Symfony\Component\HttpFoundation\Request $request) use ($app) {
    $start = 0;
    $vars = $request->query->all();
    $qsStart = (int)$vars["start"];
    $search = $vars["search"];
    $order = $vars["order"];
    $columns = $vars["columns"];
    $qsLength = (int)$vars["length"];

    if($qsStart) {
        $start = $qsStart;
    }

    $index = $start;
    $rowsPerPage = $qsLength;

    $rows = array();

    $searchValue = $search['value'];
    $orderValue = $order[0];

    $orderClause = "";
    if($orderValue) {
        $orderClause = " ORDER BY ". $columns[(int)$orderValue['column']]['data'] . " " . $orderValue['dir'];
    }

    $table_columns = array(
        'id',
        'title',
        'filiere',
        'video_link',
        'video_image_link',
        'synopsis',
        'modules',
        'student_infos',
        'prix',

    );

    $whereClause = "";

    $i = 0;
    foreach($table_columns as $col){

        if ($i == 0) {
            $whereClause = " WHERE";
        }

        if ($i > 0) {
            $whereClause =  $whereClause . " OR";
        }

        $whereClause =  $whereClause . " " . $col . " LIKE '%". $searchValue ."%'";

        $i = $i + 1;
    }

    $recordsTotal = $app['db']->executeQuery("SELECT * FROM `projets`" . $whereClause . $orderClause)->rowCount();



    $find_sql = "SELECT * FROM `projets`". $whereClause . $orderClause . " LIMIT ". $index . "," . $rowsPerPage;
    $rows_sql = $app['db']->fetchAll($find_sql, array());

    foreach($rows_sql as $row_key => $row_sql){
        for($i = 0; $i < count($table_columns); $i++){

            $rows[$row_key][$table_columns[$i]] = $row_sql[$table_columns[$i]];


        }
    }

    $queryData = new queryData();
    $queryData->start = $start;
    $queryData->recordsTotal = $recordsTotal;
    $queryData->recordsFiltered = $recordsTotal;
    $queryData->data = $rows;

    return new Symfony\Component\HttpFoundation\Response(json_encode($queryData), 200);
});

$app->match('/projets', function () use ($app) {

    $table_columns = array(
        'id',
        'title',
        'filiere',
        'video_link',
        'synopsis',
        'modules',
        'student_infos',
        'prix',

    );

    $primary_key = "id";

    return $app['twig']->render('projets/list.html.twig', array(
        "table_columns" => $table_columns,
        "primary_key" => $primary_key
    ));

})
    ->bind('projets_list');



$app->match('/projets/create', /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return mixed
     */
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return mixed
     */
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return mixed
     */
    function (Symfony\Component\HttpFoundation\Request $request) use ($app) {

        $rxyoutube = '~
        ^(?:https?://)?              # Optional protocol
         (?:www\.)?                  # Optional subdomain
         (?:youtube\.com|youtu\.be)  # Mandatory domain name
         /watch\?v=([^&]+)           # URI with video id as capture group 1
         ~x';

        $sqlModule = "SELECT * FROM `modules`";

        $modules = $app['db']->fetchAll( $sqlModule, array());


        if (is_array($modules) && !empty($modules) )
        {
            $selectmodules = array();

            foreach ($modules as $module)
            {
                $selectmodules[$module['module_name']] = $module['module_name'];
            }

        }

        $sqlUsers = "SELECT * FROM `students`";


        $users = $app['db']->fetchAll( $sqlUsers, array());


        if (is_array($users) && !empty($users) )
        {
            $selectusers = array();

            foreach ($users as $user)
            {
                $selectusers['['.$user['id'].']'.$user['firstname'].' '.$user['name']] =  $user['firstname'].' '.$user['name'];
            }

        }


        $initial_data = array(
            'title' => '',
            'filiere' => '',
            'type_video' =>'',
            'video_link' => '',
            'synopsis' => '',
            'modules' => '',
            'student_infos' =>  array(),
            'prix' => '',
        );

        $form = $app['form.factory']->createBuilder('form', $initial_data);



        $form = $form->add('title', 'text', array('required' => true));
        $form = $form->add('type_video', 'choice', array('required' => true, 'choices' => array('YouTube'=>'YouTube','Dailymotion'=>'Dailymotion'),));
        $form = $form->add('filiere', 'choice', array('required' => true, 'choices' => array('0'=>'Realisateur','1'=>'Monteur/Truquiste')));
        $form = $form->add('video_link', 'text', array('required' => true));
        $form = $form->add('synopsis', 'textarea', array('required' => true));
        $form = $form->add('modules', 'choice', array(
            'choices' => $selectmodules,
            'required' => true));
        $form = $form->add('student_infos', 'choice', array(
                'multiple' => true,
                'choices' => $selectusers,
            )
        );
        $form = $form->add('prix', 'textarea');


        $form = $form->getForm();

        if("POST" == $app['request']->getMethod()){

            $form->handleRequest($app["request"]);

            if ($form->isValid()) {

                $data = $form->getData();

                $type = $data['type_video'];

                switch($type){

                    case 'YouTube':
                        if( preg_match($rxyoutube, $data['video_link']))
                        {
                            $idvideo = youtube_id_from_url($data['video_link']);
                            if (!empty($idvideo))
                            {
                               $imageurl = 'http://img.youtube.com/vi/'.$idvideo.'/0.jpg';
                            }
                        }
                        break;

                    case 'Dailymotion':
                        $iddaylimotion = daylimotion_id_by_url($data['video_link']);
                        if (!empty($iddaylimotion))
                        {
                            $idvideo = $iddaylimotion;
                            $result = file_get_contents('https://api.dailymotion.com/video/'.$idvideo.'?fields=thumbnail_url');
                            $urlarray = json_decode($result);
                            $imageurl = $urlarray->{'thumbnail_url'};

                        }
                        break;

                    default:
                        $imageurl = "";
                        break;



                }


                $student_infos = $data['student_infos'];

                if (is_array($data['student_infos']))
                {
                    $student_infos = implode(';',$data['student_infos']);
                }

                $update_query = "INSERT INTO `projets` (`title`, `filiere`,`type_video`,`video_link`,`video_image_link`, `synopsis`, `modules`, `student_infos`, `prix`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $app['db']->executeUpdate($update_query, array($data['title'],$data['filiere'],$data['type_video'], $data['video_link'],$imageurl, $data['synopsis'], $data['modules'], $student_infos, $data['prix']));


                $app['session']->getFlashBag()->add(
                    'success',
                    array(
                        'message' => 'projets created!',
                    )
                );
                return $app->redirect($app['url_generator']->generate('projets_list'));

            }
        }

        return $app['twig']->render('projets/create.html.twig', array(
            "form" => $form->createView()
        ));

    })
    ->bind('projets_create');



$app->match('/projets/edit/{id}', function ($id) use ($app) {

    $rxyoutube = '~
        ^(?:https?://)?              # Optional protocol
         (?:www\.)?                  # Optional subdomain
         (?:youtube\.com|youtu\.be)  # Mandatory domain name
         /watch\?v=([^&]+)           # URI with video id as capture group 1
         ~x';

    $sqlModule = "SELECT * FROM `modules`";

    $modules = $app['db']->fetchAll( $sqlModule, array());


    if (is_array($modules) && !empty($modules) )
    {
        $selectmodules = array();

        foreach ($modules as $module)
        {
            $selectmodules[$module['module_name']] = $module['module_name'];
        }

    }

    $sqlUsers = "SELECT * FROM `students`";


    $users = $app['db']->fetchAll( $sqlUsers, array());


    if (is_array($users) && !empty($users) )
    {
        $selectusers = array();

        foreach ($users as $user)
        {
            $selectusers['['.$user['id'].']'.$user['firstname'].' '.$user['name']] =  $user['firstname'].' '.$user['name'];
        }

    }

    $find_sql = "SELECT * FROM `projets` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));
    if(!$row_sql){
        $app['session']->getFlashBag()->add(
            'danger',
            array(
                'message' => 'Row not found!',
            )
        );
        return $app->redirect($app['url_generator']->generate('projets_list'));
    }


    $initial_data = array(
        'title' => $row_sql['title'],
        'filiere' => $row_sql['filiere'],
        'type_video' => $row_sql['type_video'],
        'video_link' => $row_sql['video_link'],
        'video_image_link' => $row_sql['video_image_link'],
        'synopsis' => $row_sql['synopsis'],
        'modules' => $row_sql['modules'],
        'student_infos' => explode(';',$row_sql['student_infos']),
        'prix' => $row_sql['prix'],

    );


    $form = $app['form.factory']->createBuilder('form', $initial_data);




    $form = $form->add('title', 'text', array('required' => true));
    $form = $form->add('filiere', 'choice', array('required' => true, 'choices' => array('0'=>'Realisateur','1'=>'Monteur/Truquiste')));
    $form = $form->add('type_video', 'choice', array('required' => true, 'choices' => array('YouTube'=>'YouTube','Dailymotion'=>'Dailymotion'),));
    $form = $form->add('video_link', 'text', array('required' => true));
    $form = $form->add('synopsis', 'textarea', array('required' => true));
    $form = $form->add('modules', 'choice', array(
        'choices' => $selectmodules,
        'required' => true));
    $form = $form->add('student_infos', 'choice', array(
            'multiple' => true,
            'choices' => $selectusers,
        )
    );
    $form = $form->add('prix', 'textarea');


    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $type = $data['type_video'];

            switch($type){

                case 'YouTube':
                    if( preg_match($rxyoutube, $data['video_link']))
                    {
                        $idvideo = youtube_id_from_url($data['video_link']);
                        if (!empty($id))
                        {
                            $imageurl = 'http://img.youtube.com/vi/'.$idvideo.'/0.jpg';
                        }
                    }
                    break;

                case 'Dailymotion':
                    $iddaylimotion = daylimotion_id_by_url($data['video_link']);
                    if (!empty($iddaylimotion))
                    {
                        $idvideo = $iddaylimotion;
                        $result = file_get_contents('https://api.dailymotion.com/video/'.$idvideo.'?fields=thumbnail_url');
                        $urlarray = json_decode($result);
                        $imageurl = $urlarray->{'thumbnail_url'};

                    }
                    break;

                default:
                    $imageurl = "";
                    break;



            }


            $student_infos = $data['student_infos'];

            if (is_array($data['student_infos']))
            {
                $student_infos = implode(';',$data['student_infos']);
            }

            $update_query = "UPDATE `projets` SET `title` = ?,`filiere` = ?, `type_video` = ?,`video_link` = ?, `video_image_link` = ?, `synopsis` = ?, `modules` = ?, `student_infos` = ?, `prix` = ? WHERE `id` = ?";
            $app['db']->executeUpdate($update_query, array($data['title'], $data['filiere'],$data['type_video'], $data['video_link'],$imageurl, $data['synopsis'], $data['modules'],$student_infos,$data['prix'], $id));


            $app['session']->getFlashBag()->add(
                'success',
                array(
                    'message' => 'projets edited!',
                )
            );
            return $app->redirect($app['url_generator']->generate('projets_edit', array("id" => $id)));

        }
    }

    return $app['twig']->render('projets/edit.html.twig', array(
        "form" => $form->createView(),
        "id" => $id
    ));

})
    ->bind('projets_edit');



$app->match('/projets/delete/{id}', function ($id) use ($app) {

    $find_sql = "SELECT * FROM `projets` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));

    if($row_sql){
        $delete_query = "DELETE FROM `projets` WHERE `id` = ?";
        $app['db']->executeUpdate($delete_query, array($id));

        $app['session']->getFlashBag()->add(
            'success',
            array(
                'message' => 'projets deleted!',
            )
        );
    }
    else{
        $app['session']->getFlashBag()->add(
            'danger',
            array(
                'message' => 'Row not found!',
            )
        );
    }

    return $app->redirect($app['url_generator']->generate('projets_list'));

})
    ->bind('projets_delete');






