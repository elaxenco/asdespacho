<?php
require('fpdf.php');
class PDF extends FPDF
{
    public function Header($tipo_reporte='REPORTE DE: ',$imagen='logo', $orientacion='P') {
        global $suc;
        global $fecha_inicial;
        global $fecha_final;
        global $titulo;
        global $orientacion;

        if( empty($orientacion) ) $orientacion='P';
        $this->SetFillColor(260);//define el color de la pagina
        if( $orientacion=='P' ){ // VERTICAL
           // $this->RoundedRect(5, 4, 206, 19, 2.5, 'DF');
//$this->RoundedRect(5, 23, 206, 250, 2.5, 'DF');
        }
        if( $orientacion=='L' ){ // HORIZONTAL
            $this->RoundedRect(5, 4, 270, 19, 2.5, 'DF');
            $this->RoundedRect(5, 23, 270, 188, 2.5, 'DF');
        }

       // $this->Image('../../img/'.$imagen.'.png',15,6,33,15);
		$this->SetFont('Arial','B',11);
		$this->Ln(3);
		$this->Cell(100);
        $this->Cell(1,1,utf8_decode($titulo.$suc),0,0,'C');
        $this->SetFont('Arial','B',8);
        $this->Ln(6);
		$this->Cell(130);
        if( !empty($fecha_inicial) )
            $this->Cell(1,1,utf8_decode("CON FECHAS DE: $fecha_inicial AL $fecha_final"),0,0,'L');
        $this->Ln(10);
    }

    public function Footer()
    {
        $iNumPagina = $this->PageNo();
        $this->SetFont('Arial','',8);
        $this->SetY(-10);
        $this->Cell(185);
        $this->Cell(10,1,utf8_decode('Página ').$this->PageNo(),0,0,'C');
    }

    function Rotate($angle,$x=-1,$y=-1)
    {

        if($x==-1) 
            $x=$this->x; 
        if($y==-1) 
            $y=$this->y; 
        if($this->angle!=0) 
            $this->_out('Q'); 
        $this->angle=$angle; 
        if($angle!=0) 
        { 
            $angle*=M_PI/180; 
            $c=cos($angle); 
            $s=sin($angle); 
            $cx=$x*$this->k; 
            $cy=($this->h-$y)*$this->k; 
             
            $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy)); 
        } 
    }
    
    public function Lineas($w, $h, $txt, $border=0, $align='J', $fill=false,$NumLin)
    {
        //Output text with automatic or explicit line breaks
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
                $nb--;
        $b=0;
        if($border)
        {
            if($border==1)
            {
                $border='LTRB';
                $b='LRT';
                $b2='LR';
            }
            else
            {
                $b2='';
                if(strpos($border,'L')!==false)
                        $b2.='L';
                if(strpos($border,'R')!==false)
                        $b2.='R';
                $b=(strpos($border,'T')!==false) ? $b2.'T' : $b2;
            }
        }
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $ns=0;
        $nl=1;

        while($i<$nb)
        {
            //Get next character
            $c=$s[$i];
            if($c=="\n")
            {
                    //Explicit line break
                    if($this->ws>0)
                    {
                            $this->ws=0;
                            $this->_out('0 Tw');
                    }

                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                    if ($nl==$NumLin) return($nl);
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $ns=0;

                    $nl++;
                    if ($nl==$NumLin) return($nl);
                    if($border && $nl==2)
                            $b=$b2;
                    continue;
            }
            if($c==' ')
            {
                    $sep=$i;
                    $ls=$l;
                    $ns++;
            }
            $l+=$cw[$c];
            if($l>$wmax)
            {
                    //Automatic line break
                    if($sep==-1)
                    {
                            if($i==$j)
                                    $i++;
                            if($this->ws>0)
                            {
                                    $this->ws=0;
                                    $this->_out('0 Tw');
                            }

                            $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                            if ($nl==$NumLin) return($nl);
                    }
                    else
                    {
                            if($align=='J')
                            {
                                    $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                                    $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                            }

                            $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                            if ($nl==$NumLin) return($nl);
                            $i=$sep+1;

                    }
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $ns=0;
                    $nl++;
                    if($border && $nl==2)
                            $b=$b2;
            }
            else
                    $i++;
        }
        //Last chunk
        if($this->ws>0)
        {
                $this->ws=0;
                $this->_out('0 Tw');
        }
        if($border && strpos($border,'B')!==false)
                $b.='B';
        if ($nl==$NumLin) return($nl);
        $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
        if ($nl==$NumLin) return($nl);
        $this->x=$this->lMargin;
        return $nl; //THIS RETURNS THE NUMBER OF LINES!
    }

    public function BasicTable($header, $data)
    {
        // Cabecera
        //foreach($header as $col)
        //    $this->Cell(40,7,$col,1);
        //$this->Ln();
        // Datos
        //foreach($data as $row)
        //{
        //    foreach($row as $col)
        //        $this->Cell(40,6,$col,1);
        //    $this->Ln();
        //}
    }

    public function RoundedRect($x, $y, $w, $h, $r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    public function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
}

?>