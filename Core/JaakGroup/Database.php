<?php

/**
 * @license JAAKGROUP License
 * @author Abdul BATI <batiabdul5@gmail.com>
 * @Copyright (c) JAAKGROUP, 2020
 */

class Database
{
	
	public static  function connect()
	{
			try{

				$bdd = new PDO("mysql:host=185.98.131.94;dbname=jaakg1303264",'jaakg1303264','BSAouc2108',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
			catch(PDOException $e){echo "La connexion à la base de donnée a échouer:" .$e->getMessage();}
			return $bdd;
	}
	

	/*
	public static  function connect()
	{
			try{

				$bdd = new PDO("mysql:host=localhost;dbname=jaakg1303264",'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
			catch(PDOException $e){echo "La connexion à la base de donnée a échouer:" .$e->getMessage();}
			return $bdd;
	}
	*/
	
}

