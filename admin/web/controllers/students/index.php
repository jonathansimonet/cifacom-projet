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

$app->match('/students/list', function (Symfony\Component\HttpFoundation\Request $request) use ($app) {  
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
		'firstname', 
		'name', 
		'website',
        'filiere',
        'promotion'

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
    
    $recordsTotal = $app['db']->executeQuery("SELECT * FROM `students`" . $whereClause . $orderClause)->rowCount();
    
    $find_sql = "SELECT * FROM `students`". $whereClause . $orderClause . " LIMIT ". $index . "," . $rowsPerPage;
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

$app->match('/students', function () use ($app) {
    
	$table_columns = array(
		'id', 
		'firstname', 
		'name', 
		'website',
        'filiere',
        'promotion'

    );

    $primary_key = "id";	

    return $app['twig']->render('students/list.html.twig', array(
    	"table_columns" => $table_columns,
        "primary_key" => $primary_key
    ));
        
})
->bind('students_list');



$app->match('/students/create', function () use ($app) {

    $date = getdate();
    
    $initial_data = array(
		'firstname' => '', 
		'name' => '', 
		'website' => '',
        'filiere' => '',
        'promotion' => $date['year'],

    );

    $form = $app['form.factory']->createBuilder('form', $initial_data);



	$form = $form->add('firstname', 'text', array('required' => true));
	$form = $form->add('name', 'text', array('required' => true));
	$form = $form->add('website', 'text');
    $form = $form->add('filiere', 'choice', array('required' => true, 'choices' => array('0'=>'Realisateur','1'=>'Monteur/Truquiste')));
    $form = $form->add('promotion', 'number', array('required' => true));


    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $update_query = "INSERT INTO `students` (`firstname`, `name`, `website`, `filiere`) VALUES (?, ?, ?, ?, ?)";
            $app['db']->executeUpdate($update_query, array($data['firstname'], $data['name'], $data['website'], $data['filiere'], $data['promotion']));


            $app['session']->getFlashBag()->add(
                'success',
                array(
                    'message' => 'students created!',
                )
            );
            return $app->redirect($app['url_generator']->generate('students_list'));

        }
    }

    return $app['twig']->render('students/create.html.twig', array(
        "form" => $form->createView()
    ));
        
})
->bind('students_create');



$app->match('/students/edit/{id}', function ($id) use ($app) {

    $find_sql = "SELECT * FROM `students` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));

    if(!$row_sql){
        $app['session']->getFlashBag()->add(
            'danger',
            array(
                'message' => 'Row not found!',
            )
        );        
        return $app->redirect($app['url_generator']->generate('students_list'));
    }

    
    $initial_data = array(
		'firstname' => $row_sql['firstname'], 
		'name' => $row_sql['name'], 
		'website' => $row_sql['website'],
        'filiere' => $row_sql['filiere'],
        'promotion' => $row_sql['promotion']

    );


    $form = $app['form.factory']->createBuilder('form', $initial_data);


	$form = $form->add('firstname', 'text', array('required' => true));
	$form = $form->add('name', 'text', array('required' => true));
	$form = $form->add('website', 'text', array('required' => true));
    $form = $form->add('filiere', 'choice', array('required' => true, 'choices' => array('0'=>'Realisateur','1'=>'Monteur/Truquiste')));
    $form = $form->add('promotion', 'number', array('required' => true));



    $form = $form->getForm();

    if("POST" == $app['request']->getMethod()){

        $form->handleRequest($app["request"]);

        if ($form->isValid()) {
            $data = $form->getData();

            $update_query = "UPDATE `students` SET `firstname` = ?, `name` = ?, `website` = ?, `filiere` = ?, `promotion` = ? WHERE `id` = ?";
            $app['db']->executeUpdate($update_query, array($data['firstname'], $data['name'], $data['website'], $data['filiere'], $data['promotion'], $id));


            $app['session']->getFlashBag()->add(
                'success',
                array(
                    'message' => 'students edited!',
                )
            );
            return $app->redirect($app['url_generator']->generate('students_edit', array("id" => $id)));

        }
    }

    return $app['twig']->render('students/edit.html.twig', array(
        "form" => $form->createView(),
        "id" => $id
    ));
        
})
->bind('students_edit');



$app->match('/students/delete/{id}', function ($id) use ($app) {

    $find_sql = "SELECT * FROM `students` WHERE `id` = ?";
    $row_sql = $app['db']->fetchAssoc($find_sql, array($id));

    if($row_sql){
        $delete_query = "DELETE FROM `students` WHERE `id` = ?";
        $app['db']->executeUpdate($delete_query, array($id));

        $app['session']->getFlashBag()->add(
            'success',
            array(
                'message' => 'students deleted!',
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

    return $app->redirect($app['url_generator']->generate('students_list'));

})
->bind('students_delete');






