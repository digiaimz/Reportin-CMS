/* [ ---- Beoro Admin - invoices ---- ] */

    $(document).ready(function() {

        //* clone row
        var id = 0;
        $(".inv_clone_btn").click(function() {
            id++;
            var table = $(this).closest("table");
            var clonedRow = table.find(".inv_row").clone();
            clonedRow.removeAttr("class")
            clonedRow.find(".id").attr("value", id);
            clonedRow.find(".inv_clone_row").html('<i class="icon-minus inv_remove_btn"></i>');
            clonedRow.find("input").each(function() {
                $(this).val('');
            });
            table.find(".last_row").before(clonedRow);
        });
        //* remove row
        $(".invE_table").on("click",".inv_remove_btn", function() {
            $(this).closest("tr").remove();
            rowInputs();
        });
		
       //* subtotal sum
        $('#inv_form').on('keyup','.jQinv_item_price, .jQinv_item_qty ', function() {
            rowInputs();
        });

        function rowInputs() {
            var balance = 0;
            var subTotal = 0;
			var grandTotal = 0;
            var qtyTotal = 0;
            $(".invE_table tr").not('.last_row').each(function () {
                var $itemprice 		= $('.jQinv_item_price', this).val();
				var $itemqty 		= $('.jQinv_item_qty', this).val();
				var $itemshipping 	= $('.jQinv_item_shipping', this).val();
				
		
				var $lineitemtotal 			= (($itemprice * 1)  * ($itemqty * 1)); 
				var $lineitemtotalshipping 	= ($lineitemtotal + 650) ; 
				
				var $lineqtytotal 			= (($itemqty * 1)); 
				var parsedSubTotal 			= parseFloat( ('0' + $lineitemtotalshipping).replace(/[^0-9-\.]/g, ''), 10 );	
				var parsedqtyTotal 			= parseFloat( ('0' + $lineqtytotal).replace(/[^0-9-\.]/g, ''), 10 );	
				
                $('.jQinv_item_total',this).val($lineitemtotalshipping.toFixed(0));

				
		
				

                
				grandTotal += parsedSubTotal;
				qtyTotal += parsedqtyTotal;
                
            });

            
			$(".inV_grandtotal span").html(grandTotal.toFixed(0));
			$('#inV_grandtotal').val(grandTotal.toFixed(0));
			$(".inV_qtytotal span").html(qtyTotal.toFixed(0));
			$('#inV_qtytotal').val(qtyTotal.toFixed(0));
			
			
			
        }

        function clearInvForm() {
            $('#inv_form').find('input').each(function() {
                $(this).val('');
				$(".inV_grandtotal span").html('0');
				$(".inV_qtytotal span").html('0');
            })
        }
       
    });
