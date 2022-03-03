<script type="text/javascript">
   function destroyhajuu(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "hajuu/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Хажуугийн зам устгагдлаа');
                 marshhajuu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
             function destroyhoorond(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "hoorond/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Хоорондын зам устгагдлаа');
                 marshhoorond(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                     function destroy205(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "205/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('20,5 км цаг устгагдлаа');
                 marsh205(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                        function destroyurtuu30(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "urtuu30/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Өртөөнд 30 мин илүү устгагдлаа');
                 marshurtuu30(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
           function destroytechno(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "techno/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Технологит хугацаанаас илүү устгагдлаа');
                 marshtechno(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
             function destroyconst(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "const/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Тогтоосон хурданд хүрээгүй устгагдлаа');
                 marshconst(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
              function destroyuharsan(itag)
         {
             var marsh = $('#tuuzmarsh').val();
            alert(itag);
          $.ajax(
        {
            url: "uharsan/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Ухарсан устгагдлаа');
                 marshuharsan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
              function destroytuslamj(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "tuslamj/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Тусламж устгагдлаа');
                 marshtuslamj(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                function destroygraphiluu(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "graphiluu/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Графикаас илүү устгагдлаа');
                 marshgraphiluu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                function destroygraphbus(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "graphbus/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Тусламж устгагдлаа');
                 marshgraphbus(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroyepkgemtel(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "epkgemtel/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('ЭПК гэмтэл устгагдлаа');
                 marshepkgemtel(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
           function destroyhurdhetruulsen(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "hurdhetruulsen/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Хурд хэтрүүлсэн устгагдлаа');
                 marshhurdhetruulsen(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                  function destroy45(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "45/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('45 устгагдлаа');
                 marsh45(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
 

                      function destroyeffect(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "effect/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Эффект устгагдлаа');
                 marsheffect(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
           function destroytormozburuu(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "tormozburuu/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Тормоз буруу устгагдлаа');
                 marshtormozburuu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                   function destroyepkhaasan(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "epkhaasan/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('ЭПК хаасан устгагдлаа');
                 marshepkhaasan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroykran(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "kran/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Кран устгагдлаа');
                 marshkran(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                   function destroytormoztursh(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "tormoztursh/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Тормоз туршаагүй устгагдлаа');
                 marshtormoztursh(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                     function destroyoroh(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "oroh/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Орох дохио устгагдлаа');
                 marshoroh(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                  function destroygolhooloi(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "golhooloi/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Гол хоолой устгагдлаа');
                 marshgolhooloi(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroyepkajil(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "epkajil/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('ЭПК ажиллаагүй устгагдлаа');
                 marshepkajil(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                   function destroyyaraltai(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "yaraltai/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert(' Яаралтай тормоз устгагдлаа');
                 marshyaraltai(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                       function destroy20(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "20/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('20.5 км цаг устгагдлаа');
                 marsh20(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                                function destroyhii(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "hii/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Хий эргэсэн устгагдлаа');
                 marshhii(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroyattention(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "attention/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Анхаарамжаар бууж суусан устгагдлаа');
                 marshanhaaramj(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroyduud(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "duud/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Дуут дохио устгагдлаа');
                 marshduud(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroykilo(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "kilo/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Километр буруу устгагдлаа');
                 marshkilo(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                   function destroybuguiwch(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "buguiwch/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Бугуйвч устгагдлаа');
                 marshbuguiwch(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroyklub(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "klub/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Клуб у устгагдлаа');
                 marshklub(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
            function destroyjoloo(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "joloo/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Жолоодлогын бариул устгагдлаа');
                 marshjoloo(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroybusad(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "busad/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Бусад устгагдлаа');
                 marshbusad(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
         function destroyepkshilj(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "epkshilj/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('ЭПК шилжүүлээгүй устгагдлаа');
                 marshepkshilj(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                  function destroyhurdhemjigch(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "hurdhemjigch/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Хурд хэмжигч устгагдлаа');
                 marshhurdhemjigch(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                           function destroybichlegbudeg(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "bichlegbudeg/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Бичлэг бүдэг устгагдлаа');
                 marshbichlegbudeg(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
            function destroybichlegdutuu(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "bichlegdutuu/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Бичлэг дутуу устгагдлаа');
                 marshbichlegdutuu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
                     function destroytsag(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "tsag/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Цаг зогссон устгагдлаа');
                 marshtsag(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
           function destroytuuzzassan(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "tuuzzassan/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Тууз зассан устгагдлаа');
                 marshtuuzzassan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
          function destroytuuzuragdsan(itag)
         {
             var marsh = $('#tuuzmarsh').val();
         
          $.ajax(
        {
            url: "tuuzuragdsan/delete/"+itag,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": itag,
                "_method": 'DELETE',
              
            },
            success: function ()
            {
                alert('Тууз урагдсан устгагдлаа');
                 marshtuuzuragdsan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        });
         }
   function destroyanhaaramj(itag)
   {
       var marsh = $('#tuuzmarsh').val();

       $.ajax(
           {
               url: "anhaaramj/delete/"+itag,
               type: 'GET',
               dataType: "JSON",
               data: {
                   "id": itag,
                   "_method": 'DELETE',

               },
               success: function ()
               {
                   alert('Анхаарамж устгагдлаа');
                   marshattention(marsh);
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   if (jqXHR.status == 500) {
                       alert('Internal error: ' + jqXHR.responseText);
                   } else {
                       alert('Unexpected error.');
                   }
               }
           });
   }
   function destroyhaluun(itag)
   {
       var marsh = $('#tuuzmarsh').val();

       $.ajax(
           {
               url: "haluun/delete/"+itag,
               type: 'GET',
               dataType: "JSON",
               data: {
                   "id": itag,
                   "_method": 'DELETE',

               },
               success: function ()
               {
                   alert('Халуун зогсолт устгагдлаа');
                   marshhaluun(marsh);
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   if (jqXHR.status == 500) {
                       alert('Internal error: ' + jqXHR.responseText);
                   } else {
                       alert('Unexpected error.');
                   }
               }
           });
   }
   function updateanhaaramj(itag)
   {

       $.get('getmarshattent/'+itag,function(data){
           $.each(data,function(i,qwe){
               $('#anhaaramj_frommodal').val(qwe.fromstation).trigger('change');
               $('#anhaaramjspeed_fault').val(qwe.attention_id);
               $('#anhaaramj_tomodal').val(qwe.tostation).trigger('change');
               $('#anhaaramjspeed').val(qwe.speed).trigger('change');
           });

       });


   }
   function updatehaluun(itag)
   {

       $.get('gethaluun/'+itag,function(data){
           $.each(data,function(i,qwe){
               $('#haluun_timemodal').val(qwe.starttime);
               $('#haluun_stoptimemodal').val(qwe.endtime);
               $('#haluun_fault').val(qwe.hotstand_id);

           });

       });


   }
                   function updateurtuu30(itag)
         {
       
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
                $('#urtuu30_statmodal').val(qwe.fromstation).trigger('change');
                $('#urtuu30_fault').val(qwe.fault_id);
                $('#urtuu30_zogssonmodal').val(qwe.stoptime);
         });
         
          });
    
  
         }
                    function updatehajuu(itag)
         {
       
      $.get('getmarshfault/'+itag,function(data){
             $.each(data,function(i,qwe){
                $('#hajuu_urtuumodal').val(qwe.fromstation).trigger('change');
                $('#hajuu_fault').val(qwe.fault_id);
         });
         
          });
    
  
         }
           function updatehoorond(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#hoorond_statmodal').val(qwe.fromstation).trigger('change');
                $('#hoorond_minmodal').val(qwe.stoptime);
                $('#hoorond_timemodal').val(qwe.fault_time);
                $('#hoorond_reasonmodal').val(qwe.reason);
                $('#hoorond_fault').val(qwe.fault_id);

         });
         
          });
    
}
           function update205(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#205_frommodal').val(qwe.fromstation).trigger('change');
                $('#205_tomodal').val(qwe.tostation).trigger('change');
                $('#205_fault').val(qwe.fault_id);
                $('#205_zogssonmodal').val(qwe.stoptime);
                $('#205_speedmodal').val(qwe.over_speed);

         });
         
          });
    
}
           function updatetechno(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#techno_statmodal').val(qwe.fromstation).trigger('change');
                $('#techno_fault').val(qwe.fault_id);
                $('#techno_timefinmodal').val(qwe.tush_name);
                $('#techno_timemodal').val(qwe.fault_time);
                 $('#techno_zogssonmodal').val(qwe.stoptime);

         });
         
          });
    
}
           function updateconst(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#const_frommodal').val(qwe.fromstation).trigger('change');
                $('#const_fault').val(qwe.fault_id);
                $('#const_tomodal').val(qwe.tostation).trigger('change');
                $('#const_speedmodal').val(qwe.over_speed);
                

         });
         
          });
    
}
       function updatetuslamj(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#tuslamj_statmodal').val(qwe.fromstation).trigger('change');
                $('#tuslamj_fault').val(qwe.fault_id);
                $('#tuslamj_typemodal').val(qwe.fault_no).trigger('change');
                $('#tuslamj_timemodal').val(qwe.fault_time);
                $('#tuslamj_minmodal').val(qwe.stoptime);
                

         });
         
          });
    
}
       function updateuharsan(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#uharsan_statmodal').val(qwe.fromstation).trigger('change');
                $('#uharsan_fault').val(qwe.fault_id);
                $('#uharsan_timemodal').val(qwe.fault_time);
                $('#uharsan_speedmodal').val(qwe.over_speed);
                

         });
         
          });
    
}
     function updategraphiluu(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#graphiluu_statmodal').val(qwe.fromstation).trigger('change');
                $('#graphiluu_fault').val(qwe.fault_id);
                $('#graphiluu_timemodal').val(qwe.fault_time);
                $('#graphiluu_zogssonmodal').val(qwe.stoptime);
                

         });
         
          });
    
}
     function updategraphbus(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#graphbus_statmodal').val(qwe.fromstation).trigger('change');
                $('#graphbus_fault').val(qwe.fault_id);
                $('#graphbus_timemodal').val(qwe.fault_time);
                $('#graphbus_zogssonmodal').val(qwe.stoptime);
                

         });
         
          });
    
}
     function updateepkgemtel(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilepkgemtel_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilepkgemtel_fault').val(qwe.fault_id);
                $('#zurchilepkgemtel_timemodal').val(qwe.fault_time);
                $('#zurchilepkgemtel_tushnomodal').val(qwe.tush_no);
                $('#zurchilepkgemtel_tushugsunmodal').val(qwe.tush_name);
                

         });
         
          });
    
}
     function updatetormozburuu(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchiltormozburuu_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchiltormozburuu_fault').val(qwe.fault_id);
                $('#zurchiltormozburuu_timemodal').val(qwe.fault_time);
                $('#zurchiltormozburuu_kilomodal').val(qwe.fault_km);
                $('#zurchiltormozburuu_aktmodal').val(qwe.is_techact);
                 $('#zurchiltormozburuu_typemodal').val(qwe.broketype).trigger('change');
                

         });
         
          });
    
}
     function updateepkhaasan(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilepkhaasan_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilepkhaasan_fault').val(qwe.fault_id);
                $('#zurchilepkhaasan_timemodal').val(qwe.fault_time);
                $('#zurchilepkhaasan_aktmodal').val(qwe.is_techact);
                $('#zurchilepkhaasan_kilomodal').val(qwe.fault_km);
                $('#ribbonzurchilepkhaasan_typemodal').val(qwe.broketype).trigger('change');
                

         });
         
          });
    
}
  function updateepkajil(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilepkajil_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilepkajil_fault').val(qwe.fault_id);
                $('#zurchilepkajil_timemodal').val(qwe.fault_time);
                $('#zurchilepkajil_isstopmodal').val(qwe.is_stop);
                $('#zurchilepkajil_aktmodal').val(qwe.is_techact);
                $('#zurchilepkajil_zogssonmodal').val(qwe.stoptime);
                

         });
         
          });
    
}
  function updateepkshilj(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilepkshilj_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilepkshilj_fault').val(qwe.fault_id);
                $('#zurchilepkshilj_timemodal').val(qwe.fault_time);
                $('#zurchilepkshilj_reasonmodal').val(qwe.reason);
                $('#zurchilepkshilj_minutemodal').val(qwe.stoptime);
                

         });
         
          });
    
}
  function updatekran(itag){
      $.get('getmarshfault/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilkran_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilkran_fault').val(qwe.fault_id);
                $('#zurchilkran_timemodal').val(qwe.fault_time);
         
                

         });
         
          });
    
}
  function updateduud(itag){
      $.get('getmarshfault/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilduud_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilduud_fault').val(qwe.fault_id);
                $('#zurchilduud_timemodal').val(qwe.fault_time);

                

         });
         
          });
    
}
  function updateoroh(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchiloroh_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchiloroh_fault').val(qwe.fault_id);
                $('#zurchiloroh_timemodal').val(qwe.fault_time);
                $('#zurchiloroh_minmodal').val(qwe.stoptime);
                $('#zurchiloroh_reasonmodal').val(qwe.reason);

                

         });
         
          });
    
}
   function update45(itag){
       $.get('getmarshfaultdet/'+itag,function(data){
           $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
               $('#zurchil45_statmodal').val(qwe.fromstation).trigger('change');
               $('#ribbonzurchil45_fault').val(qwe.fault_id);
               $('#zurchil45_timemodal').val(qwe.fault_time);
               $('#zurchil45_minutemodal').val(qwe.stoptime);
               $('#zurchil45_reasonmodal').val(qwe.reason);



           });

       });

   }
  function updateyaraltai(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilyaraltai_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilyaraltai_fault').val(qwe.fault_id);
                $('#zurchilyaraltai_timemodal').val(qwe.fault_time);
                $('#zurchilyaraltai_zogssonmodal').val(qwe.stoptime);
                $('#zurchilyaraltai_attackmodal').val(qwe.is_stop);
                $('#zurchilyaraltai_typemodal').val(qwe.broketype).trigger('change');

                

         });
         
          });
    
}

  function updategolhooloi(itag){
      $.get('getmarshfault/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilgolhooloi_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilgolhooloi_fault').val(qwe.fault_id);
                $('#zurchilgolhooloi_timemodal').val(qwe.fault_time);
         });
         
          });
    
}
  function updatetormoztursh(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchiltormoztursh_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchiltormoztursh_fault').val(qwe.fault_id);
                $('#zurchiltormoztursh_timemodal').val(qwe.fault_time);
                $('#zurchiloroh_minmodal').val(qwe.stoptime);
                $('#zurchiltormoztursh_turshmodal').val(qwe.is_stop);

                

         });
         
          });
    
}
  function updatetuuzuragdsan(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchiltuuzuragdsan_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchiltuuzuragdsan_fault').val(qwe.fault_id);
                $('#zurchiltuuzuragdsan_timemodal').val(qwe.fault_time);
                $('#zurchiltuuzuragdsan_kilomodal').val(qwe.fault_km);
                $('#zurchiltuuzuragdsan_typemodal').val(qwe.broketype).trigger('change');

                

         });
         
          });
    
}
  function updatebichlegbudeg(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
                $('#ribbonzurchilbichlegbudeg_fault').val(qwe.fault_id);
                $('#zurchilbichlegbudeg_statmodal').val(qwe.fromstation).trigger('change');
                $('#zurchilbichlegbudeg_kilomodal').val(qwe.fault_km);
                $('#zurchilbichlegbudeg_timemodal').val(qwe.fault_time);
                 $('#zurchilbichlegbudeg_typemodal').val(qwe.broketype).trigger('change');

         });
         
          });
    
}
  function updatebichlegdutuu(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilbichlegdutuu_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilbichlegdutuu_fault').val(qwe.fault_id);
                $('#zurchilbichlegdutuu_timemodal').val(qwe.fault_time);
                $('#zurchilbichlegdutuu_kilomodal').val(qwe.fault_km);
                $('#zurchilbichlegdutuu_typemodal').val(qwe.broketype).trigger('change');
                

         });
         
          });
    
}
  function updateeffect(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchileffect_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchileffect_fault').val(qwe.fault_id);
                $('#zurchileffect_timemodal').val(qwe.fault_time);
                $('#zurchileffect_minutemodal').val(qwe.stoptime);
                $('#zurchileffect_constkilomodal').val(qwe.constkilo);
                $('#zurchileffect_constspeedmodal').val(qwe.constspeed);
                $('#zurchileffect_faultkilomodal').val(qwe.faultkilo);
                $('#zurchileffect_faultspeedmodal').val(qwe.faultspeed);
                

         });
         
          });
    
}
  function updatehurdhetruulsen(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilhurd_frommodal').val(qwe.fromstation).trigger('change');
                $('#zurchilhurd_tomodal').val(qwe.tostation).trigger('change');
                $('#ribbonzurchilhurd_fault').val(qwe.fault_id);
                $('#zurchilhurd_speedmodal').val(qwe.over_speed);
                $('#zurchilhurd_timemodal').val(qwe.fault_time);
         });
         
          });
    
}
  function updateklub(itag){
      $.get('getmarshfault/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilklub_frommodal').val(qwe.fromstation).trigger('change');
                $('#zurchilklub_tomodal').val(qwe.tostation).trigger('change');
                $('#ribbonzurchilklub_fault').val(qwe.fault_id);
                $('#zurchilklub_timemodal').val(qwe.fault_time);
         });
         
          });
    
}
  function update20(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchil20_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchil20_fault').val(qwe.fault_id);
                $('#zurchil20_zogssonmodal').val(qwe.stoptime);
                $('#zurchil20_reasonmodal').val(qwe.reason);
         });
         
          });
    
}
  function update20(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchil20_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchil20_fault').val(qwe.fault_id);
                $('#zurchil20_zogssonmodal').val(qwe.stoptime);
                $('#zurchil20_reasonmodal').val(qwe.reason);
         });
         
          });
    
}
  function updatehii(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilhii_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilhii_fault').val(qwe.fault_id);
                $('#zurchilhii_reasonmodal').val(qwe.reason);
         });
         
          });
    
}
  function updatehurdhemjigch(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilhurdhemjigch_typemodal').val(qwe.broketype).trigger('change');
                $('#zurchilhurdhemjigch_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilhurdhemjigch_fault').val(qwe.fault_id);
                $('#zurchilhurdhemjigch_kilomodal').val(qwe.fault_km);
                $('#zurchilhurdhemjigch_timemodal').val(qwe.fault_time);
                $('#zurchilhurdhemjigch_aktmodal').val(qwe.is_techact).trigger('change');
         });
         
          });
    
}
  function updatetsag(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchiltsag_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchiltsag_fault').val(qwe.fault_id);
                $('#zurchiltsag_kilomodal').val(qwe.fault_km);
                $('#zurchiltsag_timemodal').val(qwe.fault_time);

         });
         
          });
    
}
  function updatekilo(itag){
      $.get('getmarshfault/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilkilo_frommodal').val(qwe.fromstation).trigger('change');
                $('#zurchilkilo_tomodal').val(qwe.tostation).trigger('change');
                $('#ribbonzurchilkilo_fault').val(qwe.fault_id);
                $('#zurchilkilo_timemodal').val(qwe.fault_time);
         });
         
          });
    
}
function updateattention(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#zurchilanhaaramj_statmodal').val(qwe.fromstation).trigger('change');
                $('#ribbonzurchilanhaaramj_fault').val(qwe.fault_id);
                $('#zurchilanhaaramj_zogssonmodal').val(qwe.stoptime);
                $('#zurchilanhaaramj_tushaalnermodal').val(qwe.tush_name);
                $('#zurchilanhaaramj_tushaalmodal').val(qwe.tush_alba);
                $('#zurchilanhaaramj_reasonmodal').val(qwe.reason);
         });
         
          });
    
}
function updatetuuzzassan(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
               // $('#dep').val(qwe.dep_id);
                $('#ribbonzurchiltuuzzassan_fault').val(qwe.fault_id);
                $('#zurchiltuuzzassan_typemodal').val(qwe.broketype).trigger('change');
                $('#zurchiltuuzzassan_timemodal').val(qwe.fault_time);

         });
         
          });
    
}
function updatebuguiwch(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
                $('#ribbonzurchilbuguiwch_fault').val(qwe.fault_id);
                $('#zurchilbuguiwch_reasonmodal').val(qwe.reason);
         });
         
          });
    
}
function updatebusad(itag){
      $.get('getmarshfaultdet/'+itag,function(data){
             $.each(data,function(i,qwe){
                $('#ribbonzurchilbusad_fault').val(qwe.fault_id);
                $('#ribbonzurchilbusad_reasonmodal').val(qwe.reason);
         });
         
          });
    
}
                $('#hajuumodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatehajuu',
            data: $('form#hajuumodal').serialize(),
            success: function ()
            {
                alert('Хажуугийн зам засагдлаа');
                 marshhajuu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
      $('#hoorondmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatehoorond',
            data: $('form#hoorondmodal').serialize(),
            success: function ()
            {
                alert('Хоорондын зам засагдлаа');
                 marshhoorond(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
            $('#205modal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'update205',
            data: $('form#205modal').serialize(),
            success: function ()
            {
                alert('20,5 км цаг засагдлаа');
                 marsh205(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                       $('#urtuu30modal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateurtuu30',
            data: $('form#urtuu30modal').serialize(),
            success: function ()
            {
                alert('Өртөөнд 30 мин илүү засагдлаа');
                 marshurtuu30(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
              $('#technomodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatetechno',
            data: $('form#technomodal').serialize(),
            success: function ()
            {
                alert('Технологит хугацаанаас илүү засагдлаа');
                 marshtechno(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                            $('#constmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateconst',
            data: $('form#constmodal').serialize(),
            success: function ()
            {
                alert('Тогтоосон хурданд хүрээгүй засагдлаа');
                 marshconst(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                $('#uharsanmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateuharsan',
            data: $('form#uharsanmodal').serialize(),
            success: function ()
            {
                alert('Ухарсан засагдлаа');
                 marshuharsan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
             $('#tuslamjmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatetuslamj',
            data: $('form#tuslamjmodal').serialize(),
            success: function ()
            {
                alert('Тусламж засагдлаа');
                 marshtuslamj(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                          $('#graphiluumodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updategraphiluu',
            data: $('form#graphiluumodal').serialize(),
            success: function ()
            {
                alert('Графикаас илүү зогсолт засагдлаа');
                 marshgraphiluu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
              $('#graphbusmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updategraphbus',
            data: $('form#graphbusmodal').serialize(),
            success: function ()
            {
                alert('Графикийн бус зогсолт засагдлаа');
                 marshgraphbus(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                     $('#graphbusmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updategraphbus',
            data: $('form#graphbusmodal').serialize(),
            success: function ()
            {
                alert('Графикийн бус зогсолт засагдлаа');
                 marshgraphbus(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
        $('#hurdhetruulsenmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatehurd',
            data: $('form#hurdhetruulsenmodal').serialize(),
            success: function ()
            {
                alert('Хурд хэтрүүлсэн засагдлаа');
                 marshhurdhetruulsen(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
         $('#effectmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateeffect',
            data: $('form#effectmodal').serialize(),
            success: function ()
            {
                alert('Хурд хэтрүүлсэн засагдлаа');
                 marsheffect(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                  $('#tormozburuumodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatetormozburuu',
            data: $('form#tormozburuumodal').serialize(),
            success: function ()
            {
                alert('Тормоз буруу засагдлаа');
                 marshtormozburuu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
        $('#epkgemtelmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateepkgemtel',
            data: $('form#epkgemtelmodal').serialize(),
            success: function ()
            {
                alert('ЭПК гэмтэл засагдлаа');
                 marshepkgemtel(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                $('#epkhaasanmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateepkhaasan',
            data: $('form#epkhaasanmodal').serialize(),
            success: function ()
            {
                alert('ЭПК хаасан засагдлаа');
                 marshepkhaasan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
            $('#kranmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatekran',
            data: $('form#kranmodal').serialize(),
            success: function ()
            {
                alert('Кран засагдлаа');
                 marshkran(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
               $('#tormozturshmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatetormoztursh',
            data: $('form#tormozturshmodal').serialize(),
            success: function ()
            {
                alert('Тормоз туршаагүй засагдлаа');
                 marshtormoztursh(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                  $('#orohmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateoroh',
            data: $('form#orohmodal').serialize(),
            success: function ()
            {
                alert('Орох дохио засагдлаа');
                 marshoroh(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                  $('#golhooloimodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updategolhooloi',
            data: $('form#golhooloimodal').serialize(),
            success: function ()
            {
                alert('Гол хоолой засагдлаа');
                 marshgolhooloi(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                  $('#epkajilmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateepkajil',
            data: $('form#epkajilmodal').serialize(),
            success: function ()
            {
                alert('ЭПК ажиллаагүй засагдлаа');
                 marshepkajil(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                            $('#yaraltaimodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateyaraltai',
            data: $('form#yaraltaimodal').serialize(),
            success: function ()
            {
                alert('Яаралтай тормоз засагдлаа');
                 marshyaraltai(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });

          $('#20modal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'update20',
            data: $('form#20modal').serialize(),
            success: function ()
            {
                alert('20,5 засагдлаа');
                 marsh20(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
              $('#hiimodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatehii',
            data: $('form#hiimodal').serialize(),
            success: function ()
            {
                alert('Хий эргэсэн засагдлаа');
                 marshhii(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                  $('#attentionmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateattention',
            data: $('form#attentionmodal').serialize(),
            success: function ()
            {
                alert('Анхаарамжаар бууж суусан засагдлаа');
                 marshanhaaramj(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                         $('#duudmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateduud',
            data: $('form#duudmodal').serialize(),
            success: function ()
            {
                alert('Дуут дохио засагдлаа');
                 marshduud(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                                $('#kilomodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatekilo',
            data: $('form#kilomodal').serialize(),
            success: function ()
            {
                alert('Километр буруу засагдлаа');
                 marshkilo(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
          $('#buguiwchmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatebuguiwch',
            data: $('form#buguiwchmodal').serialize(),
            success: function ()
            {
                alert('Бугуйвч засагдлаа');
                 marshbuguiwch(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
            $('#klubmodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateklub',
            data: $('form#klubmodal').serialize(),
            success: function ()
            {
                alert('Клуб у засагдлаа');
                 marshklub(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                        $('#joloomodal').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatejoloo',
            data: $('form#joloomodal').serialize(),
            success: function ()
            {
                alert('Жолоодлогын бариул засагдлаа');
                 marshjoloo(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                                    $('#modalbusad').submit(function(event){
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatebusad',
            data: $('form#busadmodal').serialize(),
            success: function ()
            {
                alert('Бусад засагдлаа');
                 marshbusad(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
            $('#epkajilmodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateepkajil',
            data: $('form#epkajilmodal').serialize(),
            success: function ()
            {
                alert('ЭПК ажиллаагүй засагдлаа');
                 marshkepkajil(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                        $('#hurdhemjigchmodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatehurdhemjigch',
            data: $('form#hurdhemjigchmodal').serialize(),
            success: function ()
            {
                alert('Хурд хэмжигч засагдлаа');
                 marshhurdhemjigch(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
        $('#bichlegbudegmodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatebichlegbudeg',
            data: $('form#bichlegbudegmodal').serialize(),
            success: function ()
            {
                alert('Бичлэг бүдэг засагдлаа');
                 marshbichlegbudeg(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
       $('#bichlegdutuumodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatebichlegdutuu',
            data: $('form#bichlegdutuumodal').serialize(),
            success: function ()
            {
                alert('Бичлэг дутуу засагдлаа');
                 marshbichlegdutuu(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
        $('#tsagmodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatetsag',
            data: $('form#tsagmodal').serialize(),
            success: function ()
            {
                alert('Цаг зогссон засагдлаа');
                 marshtsag(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
              $('#epkshiljmodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updateepkshilj',
            data: $('form#epkshiljmodal').serialize(),
            success: function ()
            {
                alert('ЭПК шилжүүлээгүй засагдлаа');
                 marshepkshilj(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                $('#tuuzzassanmodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatetuuzzassan',
            data: $('form#tuuzzassanmodal').serialize(),
            success: function ()
            {
                alert('Тууз зассан засагдлаа');
                 marshtuuzzassan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
                        $('#tuuzuragdsanmodal').submit(function(event){
                  
                    event.preventDefault();

   var marsh = $('#tuuzmarsh').val();

          $.ajax(
        {
           type: 'POST',
            url: 'updatetuuzuragdsan',
            data: $('form#tuuzuragdsanmodal').serialize(),
            success: function ()
            {
                alert('Тууз урагдсан засагдлаа');
                 marshtuuzuragdsan(marsh);
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  }
              }
        });
          });
   $('#busadmodal').submit(function(event){

       event.preventDefault();

       var marsh = $('#tuuzmarsh').val();

       $.ajax(
           {
               type: 'POST',
               url: 'updatebusad',
               data: $('form#busadmodal').serialize(),
               success: function ()
               {
                   alert('Бусад засагдлаа');
                   marshbusad(marsh);
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   if (jqXHR.status == 500) {
                       alert('Internal error: ' + jqXHR.responseText);
                   }
               }
           });
   });
   $('#45modal').submit(function(event){

       event.preventDefault();

       var marsh = $('#tuuzmarsh').val();

       $.ajax(
           {
               type: 'POST',
               url: 'update45',
               data: $('form#45modal').serialize(),
               success: function ()
               {
                   alert('Ву 45 засагдлаа');
                   marsh45(marsh);
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   if (jqXHR.status == 500) {
                       alert('Internal error: ' + jqXHR.responseText);
                   }
               }
           });
   });
   $('#anhaaramjmodal').submit(function(event){

       event.preventDefault();

       var marsh = $('#tuuzmarsh').val();

       $.ajax(
           {
               type: 'POST',
               url: 'updateanhaaramj',
               data: $('form#anhaaramjmodal').serialize(),
               success: function ()
               {
                   alert('Анхаарамж засагдлаа');
                   marshattention(marsh);
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   if (jqXHR.status == 500) {
                       alert('Internal error: ' + jqXHR.responseText);
                   }
               }
           });
   });
   $('#haluunmodal').submit(function(event){

       event.preventDefault();

       var marsh = $('#tuuzmarsh').val();

       $.ajax(
           {
               type: 'POST',
               url: 'updatehaluun',
               data: $('form#haluunmodal').serialize(),
               success: function ()
               {
                   alert('Халуун зогсолт засагдлаа');
                   marshhaluun(marsh);
               },
               error: function (jqXHR, textStatus, errorThrown) {
                   if (jqXHR.status == 500) {
                       alert('Internal error: ' + jqXHR.responseText);
                   }
               }
           });
   });
</script>
     