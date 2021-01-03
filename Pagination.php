<?php
include_once("Connection.php");
?>
<link rel="stylesheet" href="MyStyle.css" type="text/css" /> 
<table align="center" width="50%"  border="1">
<tr>
<td style="text-align: center;"><b>Sort By Distance</b></td>
</tr>
<tr>
<td>

        <table align="center" border="1" width="100%" height="100%" id="data">
        <?php 
        $query = "SELECT *, 3956 * 2 * ASIN ( SQRT (
                POWER(SIN((details.latitude - 26.785430)*pi()/180 / 2),
                2) + COS(details.latitude * pi()/180) * COS(26.785430 *
                pi()/180) * POWER(SIN((details.longitude - 80.915830) *
                pi()/180 / 2), 2) ) ) as distance
                FROM details
                ORDER BY distance ASC
                ";       
        $records_per_page=3;
        $newquery = $paginate->paging($query,$records_per_page);
        $paginate->dataview($newquery);
        $paginate->paginglink($query,$records_per_page);  
        ?>
        </table>
</td>
</tr>
</table>
<div id="footer">
<a href="#">Sort by Distance</a></p>
<a href="name.php">All Restaurent</a></p>
</div>