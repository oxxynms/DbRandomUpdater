var count = 1;
function addColumn(){
    count++;
    var newcolumn = document.getElementById("newColumn") 
    newcolumn.innerHTML = newcolumn.innerHTML + "<br><input type='text', placeholder='nome da coluna', name='arraycolumn[]'> <input list='types', name='types[]', placeholder='tipo da coluna'><datalist id='types'><option value='varchar'><option value='name'><option value='int'><option value='date'></datalist><input type='number', placeholder='comprimento', name='clnLen[]'><input type='button', value='+', id='maisUma', onclick = 'addColumn()'></option><br>"
}
function addColumnData(){
    count++;
    var newcolumn = document.getElementById("newColumn") 
    newcolumn.innerHTML = newcolumn.innerHTML + "<br><input type='text', placeholder='nome da coluna', name='arraycolumn[]'> <input type ='date', name='date[]', placeholder='data inicial'><input type ='date', name='date2[]', placeholder='data final'>  <input type='text', placeholder='date', name = 'types[]'> <input type='button', value='+', id='maisUma', onclick = 'addColumn()'> <input type='button', value='data', id='maisUmaData', onclick = 'addColumnData()'>"
}
