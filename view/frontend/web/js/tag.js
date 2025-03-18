define([
    'jquery',
    'mage/mage',
    'mage/url',
    'Magento_Ui/js/model/messageList',
    'Magento_Ui/js/model/messages'
], function ($, mage, urlBuilder, globalMessageList, messages) {
    'use strict';
    
    return function (config, element) {
        var form = $(element);

        form.on('submit', function (e) {
            e.preventDefault();

            var formData = form.serialize();
            var actionUrl = form.attr('action');

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    var tags = response;
                    addTags(tags);
                },
                error: function (error) {
                    console.log(error);
                    console.log("Ocorreu um erro ao enviar o formulário. Por favor, tente novamente. Deco Tag Módulo.");
                }
            });
        });

        function addTags(tags) {
            var url;
            var urlProduct;
            var html;
            var hasTag = false;
            $('.price-box.price-final_price').each(function (i, element) {
                if(element.dataset.productId == tags[0][i]) {
                    url = getUrl(tags[1][i],tags);
                    html = "<div class='product-tag' >";

                    if(url != undefined && url != null){
                        html += '<img class="product-tag-img" src="' + url + '" />';
                        hasTag = true;
                    }

                    for(var j = 0; j <= 4 - 1; j++){

                        if(tags[3][i][j] != undefined && tags[3][i][j] != null && tags[3][i][j] != "no_selection"){
                            html += '<img class="product-tag-img" src="' + tags[3][i][j] + '" />';
                            hasTag = true;
                        }
                    }

                    html += '</div>';

                    if(hasTag == true){
                        var elementoNovo = $(html);
                        var elementoPai;
                        
                        if($(element).parent().attr('class') == "product-info-main" || $(element).parent().attr('class') == "product-item-info"){
                            elementoPai = $(element).parent()
                        }else if($(element).parent().parent().attr('class') == "product-info-main" || $(element).parent().parent().attr('class') == "product-item-info"){
                            elementoPai = $(element).parent().parent();
                        }else{
                            elementoPai = $(element).parent().parent().parent();
                        }
                        
                        elementoPai.prepend(elementoNovo);
                    }
                }
            });
        }

        function getUrl(tagProduct,tags) {
            var url;
            if(tagProduct == "Etiqueta 1"){
                url = tags[2][0];
            }
            if(tagProduct == "Etiqueta 2"){
                url = tags[2][1];
            }
            if(tagProduct == "Etiqueta 3"){
                url = tags[2][2];
            }
            if(tagProduct == "Etiqueta 4"){
                url = tags[2][3];
            }

            return url;
        }

        var ids = [];
        $('.price-box.price-final_price').each(function (i, element) {
            ids.push(element.dataset.productId);
        });

        var idsJSON = JSON.stringify(ids);
        document.getElementById("ids").value = idsJSON;

        form.submit();
    };
});