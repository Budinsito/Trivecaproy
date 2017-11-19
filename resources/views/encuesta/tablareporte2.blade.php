<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       
        <table class="table table-striped">
    <thead>
      <tr>
        <th>Preguntas</th>
        <th>Totalmente en Desacuerdo</th>
        <th>En Desacuerdo</th>
         <th>De Acuerdo</th>
         <th>Totalmente De Acuerdo</th>
         
      </tr>
    </thead>
    <tbody>
      <!--La seccion Preguntas-->
      @if($datos) @foreach($datos as $data)
        <tr>
            
        <td>{{$data->pregunta_id}} - {{$data->inicial}}</td>
        <td>{{$data->TotDesacuerdo}}</td>
        <td>{{$data->EnDesacuerdo}}</td>
        <td>{{$data->DeAcuerdo}}</td>
        <td>{{$data->TotDeAcuerdo}}</td>
        
      </tr>
        @endforeach @endif
       <!--Fin de la seccion Preguntas-->
     
      
      
    </tbody>
  </table>
</div>

</body>
</form>
  
  <form>
      
      
      <div class="container">
          <center><h2>Resumen de Clima Laboral</h2></center>
          <br></br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th COLSPAN=3 >Trato Justo - TJ</th>
        <th COLSPAN=2 >Trabajo en equipo - TE</th>
        <th COLSPAN=2> Motivacion - M</th>
        <th COLSPAN=2>Identificación con la empresa - IE</th>
         <th COLSPAN=2>Comunicación - COM</th>
          <th COLSPAN=2>Capacitación - CAP</th>
           
           
      </tr>
    </thead>
    <tbody>
        @if($totales) @foreach($totales as $datatot)
      <tr>
           
        <td >Totalmente en Desacuerdo</td>
        
        
       
        <td>{{$datatot->TJ_TotalenDesacuerdo}}</td>
        <?php
        if($datatot->TJ_TotalenDesacuerdo==null){
            echo $Porc_TJ_TotalenDesacuerdo='0';
            }
        ?>
         <td> <?php 
         if($datatot->TJ_TotalenDesacuerdo!=null){
             $TotTJ= $datatot->TJ_TotalenDesacuerdo + $datatot->TJ_TotDesacuerdo+$datatot->TJ_TotDacuerdo+$datatot->TJ_TotTotDacuerdo;
         $Porc_TJ_TotalenDesacuerdo=  number_format(($datatot->TJ_TotalenDesacuerdo/$TotTJ)*100,1); }
          echo $Porc_TJ_TotalenDesacuerdo . "%"?> </td>
        
        <td>{{$datatot->TE_TotalenDesacuerdo}}</td>
        <?php
        if($datatot->TE_TotalenDesacuerdo==null){
            echo $Porc_TE_TotalenDesacuerdo='0';
            }
             ?>
        <td><?php 
        if($datatot->TE_TotalenDesacuerdo!=null){
        $TotTe=$datatot->TE_TotalenDesacuerdo + $datatot->TE_TotDesacuerdo+$datatot->TE_TotDacuerdo+$datatot->TE_TotTotDacuerdo;
        $Porc_TE_TotalenDesacuerdo=  number_format(($datatot->TE_TotalenDesacuerdo/$TotTe)*100,1) ;
         echo $Porc_TE_TotalenDesacuerdo."%";
                 }
        ?>
            
            
            
        </td>
             <td>{{$datatot->M_TotalenDesacuerdo}}</td>
            <td>
            <?php 
            if($datatot->M_TotalenDesacuerdo==null){
            echo $Porc_M_TotalenDesacuerdo='0';
            }
             if($datatot->M_TotalenDesacuerdo!=null){
             $totM = $datatot->M_TotalenDesacuerdo+$datatot->M_TotDesacuerdo+$datatot->M_TotDacuerdo+$datatot->M_TotTotDacuerdo ; 
            $Porc_M_TotalenDesacuerdo=  number_format(($datatot->M_TotalenDesacuerdo/$totM)*100,1) ;
             echo $Porc_M_TotalenDesacuerdo."%";
             }
             ?>
                 </td>
             <td>{{$datatot->IE_TotalenDesacuerdo}}</td>
      <?php  $totIE = $datatot->IE_TotalenDesacuerdo+$datatot->IE_TotDesacuerdo+$datatot->IE_TotDacuerdo+$datatot->IE_TotTotDacuerdo ;?>
             <td>
                 <?php 
            if($datatot->IE_TotalenDesacuerdo==null){
            echo $Porc_IE_TotalenDesacuerdo='0';
            }
            if($datatot->IE_TotalenDesacuerdo!=null){
             $totIE = $datatot->IE_TotalenDesacuerdo+$datatot->IE_TotDesacuerdo+$datatot->IE_TotDacuerdo+$datatot->IE_TotTotDacuerdo ; 
            $Porc_IE_TotalenDesacuerdo=  number_format(($datatot->IE_TotalenDesacuerdo/$totIE)*100,1) ;
             echo $Porc_IE_TotalenDesacuerdo."%";
             } 
             ?>
             </td>
            
            <td>{{$datatot->COM_TotalenDesacuerdo}}</td>
            <td>
                 <?php 
            if($datatot->COM_TotalenDesacuerdo==null){
            echo $Porc_COM_TotalenDesacuerdo='0';
            }
            if($datatot->COM_TotalenDesacuerdo!=null){
           $totCOM = $datatot->COM_TotalenDesacuerdo+$datatot->COM_TotDesacuerdo+$datatot->COM_TotDacuerdo+$datatot->COM_TotTotDacuerdo ; 
            $Porc_COM_TotalenDesacuerdo=  number_format(($datatot->COM_TotalenDesacuerdo/$totCOM)*100,1) ;
             echo $Porc_COM_TotalenDesacuerdo."%";
             } 
             ?>
                
                
            </td>
            
            <td>{{$datatot->CAP_TotalenDesacuerdo}}</td>
            <td>
                <?php 
            if($datatot->CAP_TotalenDesacuerdo==null){
            echo $Porc_CAP_TotalenDesacuerdo='0';
            }
            if($datatot->CAP_TotalenDesacuerdo!=null){
           $totCAP = $datatot->CAP_TotalenDesacuerdo+$datatot->CAP_TotDesacuerdo+$datatot->CAP_TotDacuerdo+$datatot->CAP_TotTotDacuerdo ; 
            $Porc_CAP_TotalenDesacuerdo=  number_format(($datatot->CAP_TotalenDesacuerdo/$totCAP)*100,1) ;
             echo $Porc_CAP_TotalenDesacuerdo."%";
             } 
             ?>
                
                
            </td>
       </tr>
      <tr>
        <td>En Desacuerdo</td>
        <td>{{$datatot->TJ_TotDesacuerdo}}</td>
        <?php
        if($datatot->TJ_TotDesacuerdo==null){
            echo $Porc_TJ_TotDesacuerdo='0';
            }
        ?>
        
       <td> 
            <?php
            if($datatot->TJ_TotDesacuerdo!=null){
             $Porc_TJ_TotDesacuerdo= number_format(($datatot->TJ_TotDesacuerdo/$TotTJ)*100,1)  ;
                echo $Porc_TJ_TotDesacuerdo."%";
                }
                ?></td>
        
        
        <td>{{$datatot->TE_TotDesacuerdo}}</td>
          <?php
        if($datatot->TE_TotDesacuerdo==null){
            echo $Porc_TE_TotDesacuerdo='0';
            }
        ?>
        <td>
            
            <?php 
             if($datatot->TE_TotDesacuerdo!=null){
            $Porc_TE_TotDesacuerdo= number_format(($datatot->TE_TotDesacuerdo/$TotTe)*100,1)  ;
                echo $Porc_TE_TotDesacuerdo."%";
                 }
                ?>
        
        </td>
        
        
        <td>{{$datatot->M_TotDesacuerdo}}</td>
        <?php
        if($datatot->M_TotDesacuerdo==null){
            echo $Porc_M_TotDesacuerdo='0';
            }
        ?>
        <td>
             <?php 
             if($datatot->M_TotDesacuerdo!=null){
            $Porc_M_TotDesacuerdo= number_format(($datatot->M_TotDesacuerdo/$totM)*100,1)  ;
                echo $Porc_M_TotDesacuerdo."%";
                 }
                ?>
            
        </td>
        <td>{{$datatot->IE_TotDesacuerdo}}</td>
      
        
        <td>
            
           <?php
        if($datatot->IE_TotDesacuerdo==null){
            echo $Porc_IE_TotDesacuerdo='0';
            }
             if($datatot->IE_TotDesacuerdo!=null){
            $Porc_IE_TotDesacuerdo= number_format(($datatot->IE_TotDesacuerdo/$totIE)*100,1)  ;
                echo $Porc_IE_TotDesacuerdo."%";
                 }
            ?>
        </td>
       
       <td>{{$datatot->COM_TotDesacuerdo}}</td>
       
       <td>
             <?php
        if($datatot->COM_TotDesacuerdo==null){
            echo $Porc_COM_TotDesacuerdo='0';
            }
             if($datatot->COM_TotDesacuerdo!=null){
            $Porc_COM_TotDesacuerdo= number_format(($datatot->COM_TotDesacuerdo/$totCOM)*100,1)  ;
                echo $Porc_COM_TotDesacuerdo."%";
                 }
            ?>
           
           
       </td>
       
       <td>{{$datatot->CAP_TotDesacuerdo}}</td>
       <td>
           <?php
        if($datatot->CAP_TotDesacuerdo==null){
            echo $Porc_CAP_TotDesacuerdo='0';
            }
             if($datatot->CAP_TotDesacuerdo!=null){
            $Porc_CAP_TotDesacuerdo= number_format(($datatot->CAP_TotDesacuerdo/$totCAP)*100,1)  ;
                echo $Porc_CAP_TotDesacuerdo."%";
                 }
            ?> 
           
       </td>
       
      </tr>
       
      <tr>
       
          <td>De Acuerdo</td>
        <td>{{$datatot->TJ_TotDacuerdo}}</td>
        <?php
        if($datatot->TJ_TotDacuerdo==null){
            echo $Porc_TJ_TotDacuerdo='0';
            }
        ?>
        <td>
              <?php 
              if($datatot->TJ_TotDacuerdo!=null){
              $Porc_TJ_TotDacuerdo= number_format(($datatot->TJ_TotDacuerdo/$TotTJ)*100,1)  ;
               echo $Porc_TJ_TotDacuerdo."%";
                }
              ?></td>
          
          <td>{{$datatot->TE_TotDacuerdo}}</td>
          <?php
        if($datatot->TE_TotDacuerdo==null){
            echo $Porc_TE_TotDacuerdo='0';
            }
        ?>
        <td><?php 
        if($datatot->TE_TotDacuerdo!=null){
        $Porc_TE_TotDacuerdo= number_format(($datatot->TE_TotDacuerdo/$TotTe)*100,1)  ;
                echo $Porc_TE_TotDacuerdo."%";
                }
                ?></td>
        
        <td>{{$datatot->M_TotDacuerdo}}</td>
         <?php
        if($datatot->M_TotDacuerdo==null){
            echo $Porc_M_TotDacuerdo='0';
            }
        ?>
        <td>
            <?php 
        if($datatot->M_TotDacuerdo!=null){
        $Porc_M_TotDacuerdo= number_format(($datatot->M_TotDacuerdo/$totM)*100,1)  ;
                echo $Porc_M_TotDacuerdo."%";
                }
                ?>
            
            
        </td>
        
          <td>{{$datatot->IE_TotDacuerdo}}</td> 
        
        
          <td>
              <?php
        if($datatot->IE_TotDacuerdo==null){
            echo $Porc_IE_TotDacuerdo='0';
            } 
        if($datatot->IE_TotDacuerdo!=null){
        $Porc_IE_TotDacuerdo= number_format(($datatot->IE_TotDacuerdo/$totIE)*100,1)  ;
                echo $Porc_IE_TotDacuerdo."%";
                }
                ?>
              
              
          </td>
          
          <td>{{$datatot->COM_TotDacuerdo}}</td>
            
          
          <td>
         <?php
        if($datatot->COM_TotDacuerdo==null){
            echo $Porc_COM_TotDacuerdo='0';
            } 
        if($datatot->COM_TotDacuerdo!=null){
        $Porc_COM_TotDacuerdo= number_format(($datatot->COM_TotDacuerdo/$totCOM)*100,1)  ;
                echo $Porc_COM_TotDacuerdo."%";
                }
                ?>
               </td>
            
            <td>{{$datatot->CAP_TotDacuerdo}}</td>
            <td>
              <?php
        if($datatot->CAP_TotDacuerdo==null){
            echo $Porc_CAP_TotDacuerdo='0';
            } 
        if($datatot->CAP_TotDacuerdo!=null){
        $Porc_CAP_TotDacuerdo= number_format(($datatot->CAP_TotDacuerdo/$totCAP)*100,1)  ;
                echo $Porc_CAP_TotDacuerdo."%";
                }
                ?>   
            </td>
      </tr>
      
      <tr>
        <td>Totalmente De Acuerdo</td>
        <td>{{$datatot->TJ_TotTotDacuerdo}}</td>
        <?php
        if($datatot->TJ_TotTotDacuerdo==null){
            echo $Porc_TJ_TotTotDacuerdo='0';
            }
        ?>
        <td>
            <?php 
             if($datatot->TJ_TotTotDacuerdo!=null){
            $Porc_TJ_TotTotDacuerdo= number_format(($datatot->TJ_TotTotDacuerdo/$TotTJ)*100,1)  ;
               echo $Porc_TJ_TotTotDacuerdo ."%";
               }
              ?></td>
        
        
         <td>{{$datatot->TE_TotTotDacuerdo}}</td>
          <?php
        if($datatot->TE_TotTotDacuerdo==null){
            echo $Porc_TE_TotTotDacuerdo='0';
            }
        ?>
         
         
        <td><?php 
             if($datatot->TE_TotTotDacuerdo!=null){
        $Porc_TE_TotTotDacuerdo= number_format(($datatot->TE_TotTotDacuerdo/$TotTe)*100,1) ;
                echo $Porc_TE_TotTotDacuerdo."%";
                }
                ?></td>
        
        <td>{{$datatot->M_TotTotDacuerdo}}</td>
         <?php
        if($datatot->M_TotTotDacuerdo==null){
            echo $Porc_M_TotTotDacuerdo='0';
            }
        ?>
        <td>
           <?php 
             if($datatot->M_TotTotDacuerdo!=null){
        $Porc_M_TotTotDacuerdo= number_format(($datatot->M_TotTotDacuerdo/$totM)*100,1) ;
                echo $Porc_M_TotTotDacuerdo."%";
                }
                ?> 
            
        </td>
         <td>{{$datatot->IE_TotTotDacuerdo}}</td> 
         
        
         <td>
             <?php
        if($datatot->IE_TotTotDacuerdo==null){
            echo $Porc_IE_TotTotDacuerdo='0';
            }
             if($datatot->IE_TotTotDacuerdo!=null){
        $Porc_IE_TotTotDacuerdo= number_format(($datatot->IE_TotTotDacuerdo/$totIE)*100,1) ;
                echo $Porc_IE_TotTotDacuerdo."%";
                }
                ?> 
             
         </td>
        
          <td>{{$datatot->COM_TotTotDacuerdo}}</td>
            
          <td>
              <?php
        if($datatot->COM_TotTotDacuerdo==null){
            echo $Porc_COM_TotTotDacuerdo='0';
            }
             if($datatot->COM_TotTotDacuerdo!=null){
        $Porc_COM_TotTotDacuerdo= number_format(($datatot->COM_TotTotDacuerdo/$totCOM)*100,1) ;
                echo $Porc_COM_TotTotDacuerdo."%";
                }
                ?> 
              
          </td>
            
            <td>{{$datatot->CAP_TotTotDacuerdo}}</td>
            <td>
                <?php
        if($datatot->CAP_TotTotDacuerdo==null){
            echo $Porc_CAP_TotTotDacuerdo='0';
            }
             if($datatot->CAP_TotTotDacuerdo!=null){
        $Porc_CAP_TotTotDacuerdo= number_format(($datatot->CAP_TotTotDacuerdo/$totCAP)*100,1) ;
                echo $Porc_CAP_TotTotDacuerdo."%";
                }
                ?> 
                
            </td>
      </tr>
         <tr>
        <td>Total</td>
         <td>
             <?php echo $datatot->TJ_TotalenDesacuerdo + $datatot->TJ_TotDesacuerdo+$datatot->TJ_TotDacuerdo+$datatot->TJ_TotTotDacuerdo; ?>
        </td>
        <td><?php echo number_format($Porc_TJ_TotDacuerdo+$Porc_TJ_TotTotDacuerdo,1) ."%" ;?></td>
      <td><?php  echo $datatot->TE_TotalenDesacuerdo + $datatot->TE_TotDesacuerdo+$datatot->TE_TotDacuerdo+$datatot->TE_TotTotDacuerdo; ?></td>
        <td> <?php echo number_format(($Porc_TE_TotDacuerdo+$Porc_TE_TotTotDacuerdo),1)."%";?></td>
        
        <td><?php echo $datatot->M_TotalenDesacuerdo+$datatot->M_TotDesacuerdo+$datatot->M_TotDacuerdo+$datatot->M_TotTotDacuerdo ; ?></td>
        <td><?php echo number_format(($Porc_M_TotDacuerdo+$Porc_M_TotTotDacuerdo),1)."%";?></td>
         <td><?php echo $totIE ?> </td> 
          <td><?php echo number_format(($Porc_IE_TotDacuerdo+$Porc_IE_TotTotDacuerdo),1)."%";?></td>
          
          <td>
              <?php echo $datatot->COM_TotalenDesacuerdo+$datatot->COM_TotDesacuerdo+$datatot->COM_TotDacuerdo+$datatot->COM_TotTotDacuerdo ;  ?>
          </td>
            <td><?php echo number_format(($Porc_COM_TotDacuerdo+$Porc_COM_TotTotDacuerdo),1)."%";?></td>
            
            <td><?php echo $datatot->CAP_TotalenDesacuerdo + $datatot->CAP_TotDesacuerdo+$datatot->CAP_TotDacuerdo+$datatot->CAP_TotTotDacuerdo; ?></td>
           
            <td><?php echo number_format(($Porc_CAP_TotDacuerdo+$Porc_CAP_TotTotDacuerdo),1)."%";?></td>
         </tr>
     @endforeach @endif
    </tbody>
  </table>
</div>
<div class="container">
    <center><h2>Resultados finales</h2></center>
    <br></br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Competencias</th>
        <th>Porcentaje</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Capacitación</td>
        <td><?php echo number_format(($Porc_CAP_TotDacuerdo+$Porc_CAP_TotTotDacuerdo),1)."%";?></td>
      
      </tr>
    
      <tr>
        <td>Comunicación</td>
        <td><?php echo number_format(($Porc_COM_TotDacuerdo+$Porc_COM_TotTotDacuerdo),1)."%";?></td>
       
      </tr>
       
      <tr>
        <td>Identificación con la empresa</td>
        <td><?php echo number_format(($Porc_IE_TotDacuerdo+$Porc_IE_TotTotDacuerdo),1)."%";?></td>
       </tr>
       
         <tr>
        <td>Motivación</td>
        <td><?php echo number_format(($Porc_M_TotDacuerdo+$Porc_M_TotTotDacuerdo),1)."%";?></td>
       </tr>
       
       <tr>
        <td>Trabajo en equipo</td>
        <td><?php echo number_format(($Porc_TE_TotDacuerdo+$Porc_TE_TotTotDacuerdo),1)."%";?></td>
       </tr>
       
       <tr>
        <td>Trato justo</td>
        <td><?php echo number_format($Porc_TJ_TotDacuerdo+$Porc_TJ_TotTotDacuerdo,1) ."%" ;?></td>
       </tr>
    </tbody> 
   </table>

    </body> 
</html>
