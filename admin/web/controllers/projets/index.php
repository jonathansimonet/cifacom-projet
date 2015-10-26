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
        'video_link',
        'synopsis',
        'modules',
        'student_infos',

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
        'video_link',
        'synopsis',
        'modules',
        'student_infos',

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

        $sqlModule = "SELECT * FROM `modules`";

        $modules = $app['db']->fetchAll( $sqlModule, array());


        if (is_array($modules) && !empty($modules) )
        {
            $selectmodules = array();

            foreach ($modules as $module)
            {
                $selectmodules[$module['id']] = $module['module_name'];
            }

        }

        $sqlUsers = "SELECT * FROM `students`";


        $users = $app['db']->fetchAll( $sqlUsers, array());


        if (is_array($users) && !empty($users) )
        {
            $selectusers = array();

            foreach ($users as $user)
            {
                $selectusers[$user['id']] =  $user['firstname'].' '.$user['name'];
            }

        }


        $initial_data = array(
            'title' => '',
            'video_link' => '',
            'synopsis' => '',
            'modules' => '',
            'student_infos' =>  array()
        );

        $form = $app['form.factory']->createBuilder('form', $initial_data);



        $form = $form->add('title', 'text', array('required' => true));
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


        $form = $form->getForm();

        if("POST" == $app['request']->getMethod()){

            $form->handleRequest($app["request"]);

            if ($form->isValid()) {
                $data = $form->getData();

                $student_infos = $data['student_infos'];

                if (is_array($data['student_infos']))
                {
                    $student_infos = implode(' ',$data['student_infos']);
                }

                $update_query = "INSERT INTO `projets` (`title`, `video_link`, `synopsis`, `modules`, `student_infos`) VALUES (?, ?, ?, ?, ?)";
                $app['db']->executeUpdate($update_query, array($data['title'], $data['video_link'], $data['synopsis'], $data['modules'], $student_infos));


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
        'video_link' => $row_sql['video_link'],
        'synopsis' => $row_sql['synopsis'],
        'modules' => $row_sql['modules'],
        'student_infos' => $row_sql['student_infos'],

    );


    $form = $app['form.factory']->createBuilder('form', $initial_data);


    $form = $form->add('title', 'text', array('required' => true));
    $form = $form->add('video_link', 'text', array('required' => true));
    $form = $form->add('synopsis', 'textarea', array('required' => true));
    $form = $form->add('modules', 'text', array('required' => true));
    $form = $form->add('student_infos', 'textarea', array('required' => true));


    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $update_query = "UPDATE `projets` SET `title` = ?, `video_link` = ?, `synopsis` = ?, `modules` = ?, `student_infos` = ? WHERE `id` = ?";
            $app['db']->executeUpdate($update_query, array($data['title'], $data['video_link'], $data['synopsis'], $data['modules'], $data['student_infos'], $id));


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






