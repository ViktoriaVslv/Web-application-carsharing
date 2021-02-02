<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Каршеринг</title>
    </head>
    <body>
        <div align="center">
            <h2>{$title}</h2>
        <form action="index.php" method="post" name="factoriesForm">
            <input type="hidden"  name="p0" value = "{$info[0][0]}" >  <br><br>
            <input type="hidden" name="tabName" value = "{$name}" >
                
            {if $flag == "Submit"} 
                <input type="hidden" name="rt" value = {$count = 0}>
                {for $i=1 to $end1}
                    {if $i == $index[$count]}
                        {$head[$i]}: <select name="p{$i}">
                            {for $x=0 to $endList}
                                {if $list[$x][$count*2]!=""}
                                    <option name="p{$i}" value = "{$list[$x][$count*2+1]}">{$list[$x][$count*2]}</option>
                                {/if}
                            {/for}
                        </select>
                        <br><br>
                        <input type="hidden" name="yu" value = {$count++}>
                    {else}
                        {$head[$i]}: <input  type="text"  name="p{$i}" value = "{$info[0][$i]}" ><br>
                        <font color="red">{$wrongFields[$i]}  <br><br></font>
                    {/if}
                {/for}
                <button type="Submit" name="page" value="{$func}"> Сохранить </button><br><br>
                <button type="Submit" name="page" value="{$name}"> Отмена </button><br><br>
            {else}
                <input type="hidden" name="" value = {$count = 0}>
                {for $i=1 to $end1}
                    {if $i == $index[$count]}
                        {$head[$i]}: <input type="text"  readonly name="p{$i}" value = "{$list1[$count]}" >  <br><br>
                                     <input type="hidden"   name="p{$i}" value = "{$info[0][$i]}" >
                                     <input type="hidden" name="yu" value = {$count++}>
                    {else}
                        {$head[$i]}: <input type="text"   readonly name="p{$i}" value = "{$info[0][$i]}" >  <br><br>
                    {/if}
                {/for}
                <button type="Submit" name="page" value="{$name}"> Назад </button><br><br>
            {/if}
            <input type="hidden" name="pc" value = "{$pc}">
            <input type="hidden" name="pc_num" value = "{$pc_num}">
        </form>
        </div>
         
    </body>
</html>