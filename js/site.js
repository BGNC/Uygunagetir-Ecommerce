		$(document).ready(function(){
					
					
					function urunvarmi()
					{
						$.getScript("adet.php",function(veri){
							
							if(veri!=0)
							{
								$('#sayi').html(veri);
							}
							
							});
					}
			        var deneme=setInterval(function(){urunvarmi();},1000);
					
					
				
				//slide
				var Slideİndis=0;
				
				var Slideli=$(".slider ul li").length;
				var SlideUl=Slideli*800;
				$(".slider ul").css('width',SlideUl+"px");
				$.ileri=function()
				{
					Slideİndis++;
					if(Slideİndis<=Slideli-1)
					{
						var deger=Slideİndis*800;
						$(".slider ul").stop().animate({marginLeft:"-"+deger+"px"},750);
					}
					else
					{
						Slideİndis=0;
						$(".slider ul").stop().animate({marginLeft:Slideİndis+"px"},750);
					}
					
					
				}
				$.geri=function()
				{
					
					Slideİndis--;
					if(Slideİndis<0)
					{
						Slideİndis=Slideli-1;
						var deger=Slideİndis*800;
						$(".slider ul").animate({marginLeft:"-"+deger+"px"},750);
						
					}
					else
					{
						var deger=Slideİndis*800;
						$(".slider ul").animate({marginLeft:"-"+deger+"px"},750);
					}
					
				}
				
				//var slider=setInterval(function(){$.ileri();},5000);
				
				$.sepete_ekle=function(deger)
				{
					var adet=$('#adet').val();
					$.ajax({
						
						url:"sepeteat.php",
						type:"GET",
						data:{urun_id:deger,a:adet},
						success: function(donen_veri)
						{
							if(donen_veri==1)
							{
								var cevap=confirm("Giriş Yapınız !");
								if(cevap==true)
								{
									window.location.href="index.php?url=giris";
								}
							}
						}
						
						});
					
				}
				
				$.sepet_guncelle=function(id,adet)
				{
					
					window.location.href="sepetguncelle.php?id="+id+"&adet="+adet;
				}
				
				$('#kategori').change(function(){
				var kategori_id=$(this).val();
				$('#altkategori').empty();
				$.ajax({
						url:"altkategorigetir.php",
						type:"GET",
						data:"kategori_id="+kategori_id,
						success: function(donen_veri)
						{
							$('#altkategori').append(donen_veri);
						}
					});
				});
				
			$.kargo=function(id,deger)
			{
			//alert(id+" - "+deger);
			$.ajax({
				url:"kargoduzenle.php",
				type:"GET",
				data:{satis_id:id,durum:deger},
				
				});
			}	
				
					
	});