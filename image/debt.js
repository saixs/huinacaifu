jQuery.noConflict();
jQuery(document).ready(function(){
	jQuery("#login_btn").click(function(){
	jQuery("#login_sub").submit();
	});
	jQuery(".debtlink").click(function() {
                        var id = jQuery(this).attr("kid");
                        var price = parseFloat(jQuery("#db" + id).val());
                        if (price < 1 || price > 100||isNaN(price)) {
                            alert("ת���ۿ۲��ܴ���100%��С��0");
                            return false;
                        }
                        if (confirm("��ȷ����" + price + "%���ۿ�ת�����ծȨ��")) {
                            location.href = "/index.php?user&q=code/debt/debtalter&tender_id=" + id + "&discount=" + price;
                        }
                    });
                    
                    jQuery(".buydebt").click(function() {
                        var id = jQuery(this).attr("kid");
                        if (confirm("��ȷ�Ϲ����ծȨ��")) {
                            location.href = "/index.php?user&q=code/debt/debt_buy&did=" + id;
                        }
                    });
			
			jQuery('#changetoDay').click(function(){

			var isday=jQuery('#isday').val();
		
			if(isday==0){
				jQuery('#isday').val('1');
				 	 jQuery('#style').hide();
					  jQuery('#day').show();
				jQuery('#time_limit_day').show();
				jQuery('#time_limit').hide();
			}else{
				jQuery('#isday').val('0');
				 jQuery('#style').show();
			jQuery('#day').hide();
				jQuery('#time_limit_day').hide();
				jQuery('#time_limit').show();
			}

			jQuery('#borrow_day').toggle('slow');
			
								
			});

});