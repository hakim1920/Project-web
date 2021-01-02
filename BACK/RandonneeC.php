<?php
 include "config.php";
 include "C:/wamp64/www/Tunisia-tour-master/BACK/Randonnee.php";
 class RandonneeC {


	function ajouterrandonneeC($randonnee){
		$sql="insert into randonnee (id,nom,region,num,photo,description, cout) values (:id, :nom,:region,:num, :photo, :description, :cout)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$randonnee->getid();
		$nom=$randonnee->getnom();
		$region=$randonnee->getregion();
        $num=$randonnee->getnum();
        $photo=$randonnee->getphoto();
        $description=$randonnee->getdescription();
        $cout=$randonnee->getcout();

		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':region',$region);

		$req->bindValue(':num',$num);
		$req->bindValue(':photo',$photo);
        $req->bindValue(':description',$description);
        $req->bindValue(':cout',$cout);        

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
    }
    
 

    function afficherrandonnee(){
	
		$sql="SElECT * From randonnee";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    


    function supprimerrandonnee($id){
		$sql="DELETE FROM randonnee where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    

    function modifierrandonnee($randonnee,$id){
		$sql="UPDATE randonnee SET id=:idd, nom=:nom, region=:region, num=:num,description=:description, photo=:photo , cout=:cout WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$randonnee->getid();
		$nom=$randonnee->getnom();
		$region=$randonnee->getregion();
        $num=$randonnee->getnum();
		$photo=$randonnee->getphoto();
        $description=$randonnee->getdescription();
        $cout=$randonnee->getcout();		

      
       
		$datas = array(':idd'=>$idd,':id'=>$id,  ':nom'=>$nom, ':region'=>$region,':num'=>$num, ':photo'=>$photo, 'description'=>$description, 'cout'=>$cout );
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);

		$req->bindValue(':nom',$nom);
		$req->bindValue(':region',$region);

		$req->bindValue(':num',$num);
		$req->bindValue(':photo',$photo);
        $req->bindValue(':description',$description);
        $req->bindValue(':cout',$cout);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
    }
    

    function recupererrandonnee($id){
		$sql="SELECT * from randonnee where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


 }

?>