<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #fff;
  color: black;
}
</style>
<script>
window.print();

</script>
</head>
<body>

<table id="customers">
<thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Mampu</th>
                                            <th>Kurang Mampu</th>
                                            <th>Tidak Mampu</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Mampu</th>
                                            <th>Kurang Mampu</th>
                                            <th>Tidak Mampu</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                        <tr>
                                            <td>1</td>
                                            <td>2017</td>
                                            <td><?= $countMampu2017['jumlah'];?></td>
                                            <td><?= $countKurangMampu2017['jumlah'];?></td>
                                            <td><?= $countTdkMampu2017['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2016</td>
                                            <td><?= $countMampu2016['jumlah'];?></td>
                                            <td><?= $countKurangMampu2016['jumlah'];?></td>
                                            <td><?= $countTdkMampu2016['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>2015</td>
                                            <td><?= $countMampu2015['jumlah'];?></td>
                                            <td><?= $countKurangMampu2015['jumlah'];?></td>
                                            <td><?= $countTdkMampu2015['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>2014</td>
                                            <td><?= $countMampu2014['jumlah'];?></td>
                                            <td><?= $countKurangMampu2014['jumlah'];?></td>
                                            <td><?= $countTdkMampu2014['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>2013</td>
                                            <td><?= $countMampu2013['jumlah'];?></td>
                                            <td><?= $countKurangMampu2013['jumlah'];?></td>
                                            <td><?= $countTdkMampu2013['jumlah'];?></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>2012</td>
                                            <td><?= $countMampu2012['jumlah'];?></td>
                                            <td><?= $countKurangMampu2012['jumlah'];?></td>
                                            <td><?= $countTdkMampu2012['jumlah'];?></td>
                                        </tr>
                                       
                                    </tbody>
  
</table>

</body>
</html>
