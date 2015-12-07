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


$app->match('/modules/list', function (Symfony\Component\HttpFoundation\Request $request) use ($app) {
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
		'module_name',

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

    $recordsTotal = $app['db']->executeQuery("SELECT * FROM `modules`" . $whereClause . $orderClause)->rowCount();

    $find_sql = "SELECT * FROM `modules`". $whereClause . $orderClause . " LIMIT ". $index . "," . $rowsPerPage;
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

$app->match('/modules', function () use ($app) {
    
	$table_columns = array(
		'id', 
		'module_name', 

    );

    $primary_key = "id";	

    return $app['twig']->render('modules/list.html.twig', array(
    	"table_columns" => $table_columns,
        "primary_key" => $primary_key
    ));
        
})
->bind('modules_list');



$app->match('/modules/create', function () use ($app) {
    
    $initial_data = array(
		'module_name' => '', 

    );

    $form = $app['form.factory']->createBuilder('form', $initial_data);



	$form = $form->add('module_name', 'text', array('required' => true));


    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $update_query = "INSERT INTO `modules` (`module_name`) VALUES (?)";
            $app['db']->executeUpdate($update_query, array($data['module_name']));            


            $app['session']->getFlashBag()->add(
                'success',
                array(
                    'message' => 'modules created!',
                )
            );
            return $app->redirect($app['url_generator']->generate('modules_list'));

        }
    }

    return $app['twig']->render('modules/create.html.twig', array(
        "form" => $form->createView()
    ));
        
})
->bind('modules_create');



$app->match('/modules/edit/{id}', function ($id) use ($app) {

    $find_sql = "SELECT * FROM `modules` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));

    if(!$row_sql){
        $app['session']->getFlashBag()->add(
            'danger',
            array(
                'message' => 'Row not found!',
            )
        );        
        return $app->redirect($app['url_generator']->generate('modules_list'));
    }

    
    $initial_data = array(
		'module_name' => $row_sql['module_name'], 

    );


    $form = $app['form.factory']->createBuilder('form', $initial_data);


	$form = $form->add('module_name', 'text', array('required' => true));


    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $update_query = "UPDATE `modules` SET `module_name` = ? WHERE `id` = ?";
            $app['db']->executeUpdate($update_query, array($data['module_name'], $id));            


            $app['session']->getFlashBag()->add(
                'success',
                array(
                    'message' => 'modules edited!',
                )
            );
            return $app->redirect($app['url_generator']->generate('modules_edit', array("id" => $id)));

        }
    }

    return $app['twig']->render('modules/edit.html.twig', array(
        "form" => $form->createView(),
        "id" => $id
    ));
        
})
->bind('modules_edit');



$app->match('/modules/delete/{id}', function ($id) use ($app) {

    $find_sql = "SELECT * FROM `modules` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));

    if($row_sql){
        $delete_query = "DELETE FROM `modules` WHERE `id` = ?";
        $app['db']->executeUpdate($delete_query, array($id));

        $app['session']->getFlashBag()->add(
            'success',
            array(
                'message' => 'modules deleted!',
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

    return $app->redirect($app['url_generator']->generate('modules_list'));

})
->bind('modules_delete');






