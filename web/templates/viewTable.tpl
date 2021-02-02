
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Каршеринг</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <style>
            .b1 {
                background: navy; /* Синий цвет фона */
                color: white; /* Белые буквы */
                font-size: 9pt; /* Размер шрифта в пунктах */
            }
        </style>
        <script type="text/javascript">  
            {include file="..\javascript\alert.js"}
        </script>   
    </head>
        
    <body>
       {if $role != "Admin" || $name == "users"}
        <form action="index.php" method="post" name="factoriesForm">
            <button type="Submit" name="page" value="showMenu"> Меню </button><br><br>
        </form>
        {else}
            <form action="index.php" method="post" name="factoriesForm">
                <button type="Submit" name="page" value="showMenu"> Меню </button><br><br>
            </form>
    
        <form action="index.php" method="post" >
            <input type="hidden" name="tabName" value = "{$name}" >
            <button type="Submit" name="page" value="add"> Добавить</button><br><br>
            <input type="hidden" name="pc" value = {$pcI}>
            <input type="hidden" name="pc_num" value = "{$pc_num}">
        </form>
        {/if}

        <table id="myTable2" class="table_sort" border="1" width="100%" cellpadding="5">
            <thead>
                <tr>
                    {for $i=1 to $end2}
                        <th onclick="sortTable({$i-1})" width="10%">{$head[$i]}</th>
                    {/for}
                    <th  width="10%">Опции</th>
                </tr>
            </thead>
            <tbody>
                
                {if ($end1 > $pcI*$pc_num+($pc_num-1))}
                {$end1 = $pcI*$pc_num+($pc_num-1)}
                {/if}
               
                {for $i=($pcI*$pc_num) to ($end1)}
                <tr>
                    {for $j=1 to $end2}
                        {if $head[$j] eq 'Изображение'}
                           <td> <img src="{$notes[$i][$j]}"></td>
                        {elseif $head[$j] eq 'Сайт'}
                             <td width="10%"><a href="{$notes[$i][$j]}">{$notes[$i][$j]}</td>
                        {elseif $head[$j] eq 'Роль'}
                            {if $notes[$i][2]}
                                 <td width="10%">Админ</td>
                            {else}
                                <td width="10%">Пользователь</td>
                            {/if}
                        {else}
                            <td width="10%">{$notes[$i][$j]}</td>
                        {/if}
                    {/for}
                    <td width="10%">
                        <form action="index.php" method="post" name="factoriesForm" >
                            <input type="hidden" name="id" value = "{$notes[$i][0]}" >
                            <input type="hidden" name="pc" value = "{$pcI}">
                            <input type="hidden" name="pc_num" value = "{$pc_num}">
                            <input type="hidden" name="tabName" value = "{$name}" >
                            <input type="hidden" name="page" value = "show" >
                            {if $role != "Admin"}
                                <button type= "submit" name ="flag"  value ="hidden">Просмотр</button><br>
                            {else}
                                {if $name == "users"}
                                    {if $notes[$i][2]!=1}
                                    {if $notes[$i][3] }
                                       
                                       <button type= "submit" name ="login"  value ="{$notes[$i][1]}">Разбанить</button><br>
                                       <input type="hidden" name="ban" value = "0" >
                                       <input type="hidden" name="page" value = "ban" >
                                    {else}
                                        <button type= "submit" name ="login"  value ="{$notes[$i][1]}">Забаниить</button><br>
                                        <input type="hidden" name="ban" value = "1" >
                                        <input type="hidden" name="page" value = "ban" > 
                                    {/if}
                                    {/if}
                                {else}
                                    <button type= "submit" id = "search"  name ="page" onClick ="return isDelete();"   value ="delete" >Удалить </button><br>
                                    <button type= "submit" name ="flag"  value ="Submit">Изменить</button><br>
                                    <button type= "submit" name ="flag"  value ="hidden">Просмотр</button><br>
                                {/if}
                            {/if}
                        
                        </form>
                    </td>
                </tr>
            </tbody>
            {/for}
        </table> 
        <div align="center">
            <table>   
                {for $i=0 to $pc-1}
                   <th>
                        <form action="view.php" method="post" name="factoriesForm" >
                             <input type="hidden" name="pc" value = "{$i}">
                             <input type="hidden" name="pc_num" value = "{$pc_num}">
                             {if $i == $pcI} 
                                 <button type= "submit" class ="b1" name ="page"  value ="{$name}">{$i+1}</button>
                             {else}
                                 <button type= "submit" name ="page"  value ="{$name}">{$i+1}</button>
                             {/if}
                         </form>
                    </th>
                {/for}
             </table>
             <table>
                  <td>
                   Количество записей на странице 
                   </td>
                   <td>
                   {if $pc_num == 5} 
                   <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "5">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit" name ="page" class ="b1" value ="{$name}">5</button> 
                    </form>
                    </td>
                    <td>
                        
                   <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "10">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit"   name ="page"  value ="{$name}">10</button> 
                    </form>
                    </td>
                    {else}
                        <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "5">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit" name ="page"  value ="{$name}">5</button> 
                    </form>
                    </td>
                    <td>
                        
                   <form action="view.php" method="post" name="factoriesForm" >
                        <input type="hidden" name="pc_num" value = "10">
                        <input type="hidden" name="pc" value = "0">
                        <button type= "submit"   name ="page" class ="b1" value ="{$name}">10</button> 
                    </form>
                    </td>
                        
                    {/if}
                
             </table> 
         </div>

       
        </body>
    </html>
