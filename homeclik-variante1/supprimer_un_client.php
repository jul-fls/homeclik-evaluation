<?php
    $title = "Supprimer un client";
    require_once "commons/header.php";
    require_once "commons/dbconfig.php";
    if(isset($_GET['id'])&&isset($_GET['safecheck'])&&$_GET['safecheck']){
        $sanitized_id_client = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM clients WHERE id = ?";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"i",$sanitized_id_client);
        $status = mysqli_stmt_execute($stmt);
        if($conn->affected_rows==1){
            echo '<script>Swal.fire({title: "Le client a bien été supprimé",text: "Le client n° '.$sanitized_id_client.' a bien été supprimé",icon: "success",confirmButtonText: "OK"}).then(function() {window.location.href = "index.php";});</script>';
        }else{
            echo '<script>Swal.fire({title: "Erreur",text: "Le client n° '.$sanitized_id_client.' n\'existe pas, merci de vérifier le compte saisi !",icon: "error",confirmButtonText: "OK"}).then(function() {window.location.href = "index.php";});</script>';
        }
    }else{
        $sanitized_id_client = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }
?>
<a class="w3-button w3-red" href="#" onclick="javascript:supprimer_client(<?=$sanitized_id_client?>);"><i class="fa fa-power-off"></i> Supprimer le client <?=$sanitized_id_client?></a>
<script>
    function supprimer_client(id_client){
        confirmation = window.confirm('Etes vous sûr de vouloir supprimer le client '+id_client+' ?');
            if(confirmation){
                document.location.href = "<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?safecheck=1&id="+id_client;
            }
        }
</script>
<?php require_once "commons/footer.php";?>