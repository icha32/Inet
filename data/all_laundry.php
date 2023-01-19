<br />
<?php 
require_once('../class/Laundry.php');
$laundries = $laundry->all_laundry();
 ?>

<div class="table-responsive">
        <table id="myTable-laundry" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Nama </th>
                    <th><center>Urutan #</center></th>
                    <th><center>Berat</center></th>
                    <th><center>Tipe</center></th>
                    <th><center>Paket</center></th>
                    <th><center>Tanggal</center></th>
                    <th><center>Total</center></th>
                    <th><center>Pengambilan</center></th>
                    <th><center>Opsi</center></th>
                </tr>
            </thead>
            <tbody>
            	<?php
                    foreach($laundries as $l): 
                    $amount = $l['laun_weight'] * $l['laun_type_price'] + ($l['laun_pengambilan'] == "diantar" ? 7000 : 0);
                ?>
                <tr align="center">
                    <td><input type="checkbox" name="imSlepy" value="<?= $l['laun_id']; ?>"></td>
                    <td align="left"><?= ucwords($l['customer_name']); ?></td>
                    <td><?= $l['laun_id']; ?></td>
                    <td><?= $l['laun_weight']; ?> Kg</td>
                    <td><ul><?php
                        $types = json_decode($l['laun_types']);
                        foreach($types as $type){
                            echo "<li>$type</li>";
                        }
                    ?></ul></td>
                    <td><?= $l['laun_paket']; ?></td>
                    <td><?= $l['laun_date_received']; ?></td>
                    <td><?= 'Rp. '.number_format($amount, 2, ".", "."); ?></td>
                    <td><?= $l['laun_pengambilan'] == "diantar" ? "Diantar" : "Diambil"; ?></td>
                    <td>
                        <button onclick="editLaundry('<?= $l['laun_id']; ?>')" type="button" class="btn btn-warning btn-xs">
                           Edit
                           <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </button>
                    </td>
                </tr>
	            <?php endforeach; ?>
            </tbody>
        </table>
</div>


<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-laundry').DataTable();
    });
</script>

<?php $laundry->Disconnect(); ?>