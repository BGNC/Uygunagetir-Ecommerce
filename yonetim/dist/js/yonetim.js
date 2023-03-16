$(document).ready(function(){
		
		//alt kategori getirme
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
				//menu uzerinde yazıyı kaydırma
					$(".menu a").hover(function(){
						
						var indis=$(this).index()-1;
						$(".menu a:eq("+indis+")").stop().animate({"text-indent":"30px"},300);
						
					},function(){
						var indis=$(this).index()-1;
						$(".menu a:eq("+indis+")").stop().animate({"text-indent":"5px"},300);		
					});
					// urunsil fonksiyonu
			$.urunsil=function(deger){
				
				var cevap=confirm("Emin Misiniz!");
				if(cevap==true)
				{
					window.location.href="urunsil.php?urun_id="+deger;
				}
			}
			
		//Vitrin Düzenle
		
		$.vitrinekle=function(deger)
		{
			$.get("vitrinduzenle.php","urun_id="+deger,function(veri){
				
				if(veri==1)
				{
					alert("Vitrinde 12 Adet Ürün Bulunmakta.");
					window.location.reload();
				
				}
				
				});
		}
		
		$.kargo=function(id,deger)
		{
			//alert(id+" - "+deger);
			$.ajax({
				url:"kargoduzenle.php",
				type:"GET",
				data:{satis_id:id,durum:deger},
				
				});
		}
		
		$.tablist=function(deger)
		{
			
			var x=document.getElementsByClassName("tab");
			for(var i=0;i<x.length;i++)
			{
				x[i].style.display="none";
			}
			document.getElementById(deger).style.display="block";
		}
							
	});