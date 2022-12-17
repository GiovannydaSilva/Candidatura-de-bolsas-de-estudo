<?php require 'Includes/head.php'; ?>

<?php require 'Includes/header.php'; ?>

<div class="content-outer-wrapper">
   <div class="chance" style="background: linear-gradient(-87deg, #04B8DD 0, #419cce 100% ) !important"></div>
   <section class="profile-page">
      <div class="container">

         <div class="row">
            <div class="col-md-12 si-box-padding">
               <section class="common-head-wrapper-sm clearfix">

                  <div class="wrapper-head">
                     <h4><i class="#"></i><span>Administração</span></h4>
                  </div>

                  <div class="bread-crumbs">
                     <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Administração</a></li>
                     </ul>
                  </div>

               </section>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">

               <section class="dash-main-widget-box">

                  <div class="row">

                     <div class="col-sm-3 si-box-padding">
                        <div class="dash-box">
                           <h2><?php 
                              $cont = new User();
                              $contador = $cont->EXE_QUERY("SELECT * FROM tb_universidade");
                              echo count($contador);?></h2>
                           <p>Universidades <span>Total registro</span></p>
                           <div class="control-in-dc above-box">
                              <!-- <span>6%</span><i class="ti-arrow-up"></i> -->
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-3 si-box-padding">
                        <div class="dash-box">
                           <h2><?php 
                              $cont = new User();
                              $contador = $cont->EXE_QUERY("SELECT * FROM tb_estudante");
                              echo count($contador);?></h2>
                           <p>Invoice Estudantes <span>Total registro</span></p>
                           <div class="control-in-dc down-box">
                              <!-- <span>2%</span><i class="ti-arrow-down"></i> -->
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-3 si-box-padding">
                        <div class="dash-box">
                           <h2><?php 
                              $cont = new User();
                              $contador = $cont->EXE_QUERY("SELECT * FROM tb_candidatura_bolsa");
                              echo count($contador);?></h2>
                           <p>Candidatos <span>Total registro</span></p>
                           <div class="control-in-dc above-box">
                              <!-- <span>15%</span><i class="ti-arrow-up"></i> -->
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-3 si-box-padding">
                        <div class="dash-box">
                           <h2><?php 
                              $cont = new User();
                              $contador = $cont->EXE_QUERY("SELECT * FROM tb_usuario");
                              echo count($contador);?></h2>
                           <p>Usuários <span>Total registro</span></p>
                           <div class="control-in-dc down-box">
                              <span> <?= count($contador); ?> %</span><i class="ti-arrow-down"></i>
                           </div>
                        </div>
                     </div>

                  </div>

               </section>

               <section class="chart-section-dash">
                  <div class="row">

                     <div class="col-md-8 si-box-padding">
                        <div class="chart-blue-value">
                           <div class="chart-head">
                              <div class="row">
                                 <div class="col-sm-7 col-xs-12">
                                    <h4>Gráfico de usuários registrados</h4>
                                 </div>
                                 <div class="col-sm-5 col-xs-12">
                                    <ul class="chart-selection-date clearfix">
                                       <li><a href="#">Hoje</a></li>
                                       <li><a href="#">Semanalmente</a></li>
                                       <li><a href="#">Mensalmente</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="card-body" >
                              <div class="chart-container" style="height: 380px">
                                 <canvas id="lineChart" style="height: 60%"></canvas>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-4 si-box-padding">
                        <div class="border-table widget-wrapper-sm scroll-table-sm">
                           <div class="table-head">
                              <p>Listagem de relatórios disponíveis</p>
                           </div>
                           <div class="table-resposive">
                              <table class="table sm-custom-table">
                                 <thead>
                                    <tr>
                                       <th>Id</th>
                                       <th>Nome do Relatário</th>
                                       <th>Acção</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>1</td>
                                       <td>Relatório de usuários</td>
                                       <td><a href="../Public/usuarios.php" target="_blank" class="btn btn-sm btn-primary">visualizar</a></td>
                                    </tr>
                                    <tr>
                                       <td>2</td>
                                       <td>Relatório de candidatos</td>
                                       <td><a href="../Public/candidatos.php" target="_blank" class="btn btn-sm btn-primary">visualizar</a></td>
                                    </tr> 
                                    <tr>
                                       <td>3</td>
                                       <td>Relatório de universidades</td>
                                       <td><a href="../Public/universidades.php" target="_blank" class="btn btn-sm btn-primary">visualizar</a></td>
                                    </tr> 
                                    <tr>
                                       <td>4</td>
                                       <td>Relatório de estudantes</td>
                                       <td><a href="../Public/estudantes.php" target="_blank" class="btn btn-sm btn-primary">visualizar</a></td>
                                    </tr> 
                                 </tbody>
                              </table>
                           </div>
                        </div>


                        <div class="merchant-configuration-dash">
                           <a href="perfil.php" class="clearfix">

                              <div class="config-icon">
                                 <div class="icon-box">
                                    <i class="ti-panel"></i>
                                 </div>
                              </div>

                              <div class="config-para">
                                 <h3>Perfil<span>Acesso rápido ao perfil</span></h3>
                              </div>

                           </a>
                        </div>

                     </div>

                  </div>
               </section>
            </div>
         </div>
      </div>
   </section>
</div>

<?php require 'Includes/footer.php' ?>
<?php require '../Public/grafic.php' ?>


<script>
   var lineChart = document.getElementById('lineChart').getContext('2d');
   var myLineChart = new Chart(lineChart, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Usuários registrados",
					borderColor: "#fff",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#fff",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: <?= json_encode($mensalUsuarios) ?>
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					position: 'bottom',
					labels: {
						padding: 10,
						fontColor: '#00acc1',
					}
				},
				tooltips: {
					bodySpacing: 4,
					mode: "nearest",
					intersect: 0,
					position: "nearest",
					xPadding: 10,
					yPadding: 10,
					caretPadding: 10
				},
				layout: {
					padding: { left: 15, right: 15, top: 15, bottom: 15 }
				}
			}
		});
</script>