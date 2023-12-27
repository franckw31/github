<?php
include('../includes/config.php');
$id = 1;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Astuce et effet CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- <link rel="stylesheet" href="css/mes-styles.css2"> -->
    <link rel="stylesheet" href="css/les-styles.css2">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script type="text/javascript"> new DataTable('table.display');</script> 
</head>

<body>
    <div class="entete">
        <table id="1" class="table.display" style="width:100%">
            <thead>
                <tr>
                    <th>Identifiant
                    </th>
                    <th>Nom
                    </th>
                    <th>Commentaire
                    </th>
                    <th>Supprimer
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Identifiant
                    </th>
                    <th>Nom
                    </th>
                    <th>Commentaire
                    </th>
                    <th>Supprimer
                    </th>
                </tr>
            </tfoot>
            <tbody>
                <?php $ret = mysqli_query($con, "SELECT * FROM `competences-individu` WHERE `id-indiv` = '$id'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) { ?>
                    <?php
                    $id2 = $row['id-comp'];

                    $sql2 = mysqli_query($con, "SELECT * FROM `competences` WHERE `id` = '$id2'");
                    while ($row2 = mysqli_fetch_array($sql2)) { ?>
                        <tr>
                            <td>
                                <?php echo $row2['nom']; ?>
                            </td>
                            <td>
                                <?php echo $row2['commentaire']; ?>
                            </td>
                            <td>
                                <?php echo $row['date']; ?>
                            </td>
                        <?php } ?>
                        <td>
                            <a href="edit-competences.php?id=<?php echo $row['id']; ?>" class="btn btn-transparent btn-xs"
                                tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
                            <i class="fas fa-edit"></i></a>
                            <a href="ajout-competences.php?id=<?php echo $row['id'] ?>&del=deleteind"
                                onClick="return confirm('Are you sure you want to delete?')"
                                class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i
                                    class="fa fa-times fa fa-white"></i></a>
                        </td>
                    </tr>
                    <?php $cnt = $cnt + 1;
                } ?>
            </tbody>
        </table>
    </div>
    <div id="conteneur">
        <div id="contenu">
            <div id="auCentre">
                <div id="bMenu">
                    <a href="#" id="css" class="btn" onmouseover="afficher('css')">Css</a>
                    <a href="#" id="js" class="btn" onmouseover="afficher('js')">JS</a>
                    <a href="#" id="php" class="btn" onmouseover="afficher('php')">Php</a>
                </div>
                <div id="bSection">
                    <div id="cssE" class="rubrique bgImg" style="background-image:url(img/logo-css.png);">
                        a
                    </div>
                    <div id="jsE" class="rubrique bgImg" style="background-image:url(img/logo-javascript.png);">
                        b
                        <!-- <table id="" class="table.display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Identifiant
                                    </th>
                                    <th>Nom
                                    </th>
                                    <th>Commentaire
                                    </th>
                                    <th>Supprimer
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Identifiant
                                    </th>
                                    <th>Nom
                                    </th>
                                    <th>Commentaire
                                    </th>
                                    <th>Supprimer
                                    </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $ret = mysqli_query($con, "SELECT * FROM `competences-individu` WHERE `id-indiv` = '$id'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) { ?>
                                    <?php
                                    $id2 = $row['id-comp'];

                                    $sql2 = mysqli_query($con, "SELECT * FROM `competences` WHERE `id` = '$id2'");
                                    while ($row2 = mysqli_fetch_array($sql2)) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $row2['nom']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row2['commentaire']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['date']; ?>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <a href="edit-competences.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i
                                                    class="fa fa-pencil"></i></a>
                                            <i class="fas fa-edit"></i></a>
                                            <a href="ajout-competences.php?id=<?php echo $row['id'] ?>&del=deleteind"
                                                onClick="return confirm('Are you sure you want to delete?')"
                                                class="btn btn-transparent btn-xs tooltips" tooltip-placement="top"
                                                tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                        </td>
                                    </tr>
                                    <?php $cnt = $cnt + 1;
                                } ?>
                            </tbody>
                        </table> -->
                    </div>
                    <div id="phpE" class="rubrique bgImg" style="background-image:url(img/logo-php.png);">
                        c
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" language="javascript">
        new DataTable('table.display');
    </script>
    <script type="text/javascript" language="javascript">
        function afficher(id) {
            var leCalque = document.getElementById(id);
            var leCalqueE = document.getElementById(id + "E");

            document.getElementById("cssE").className = "rubrique bgImg";
            document.getElementById("jsE").className = "rubrique bgImg";
            document.getElementById("phpE").className = "rubrique bgImg";

            document.getElementById("css").className = "btn";
            document.getElementById("js").className = "btn";
            document.getElementById("php").className = "btn";

            leCalqueE.className += " montrer";
            leCalque.className = "btnA";
        }
    </script>
    <script type="text/javascript" language="javascript">
        afficher('css');
    </script>
</body>

</html>