var infost = false;
var catst = false;
// var ordst = false;
document.getElementById("id_butMYINFO").onclick=function()
{
    if(infost)
        {
            document.getElementById("id_secUSERINFO").style.display="none";
        }
    else
        {
            document.getElementById("id_secUSERINFO").style.display="block";
        }
    infost = !infost;
}

document.getElementById("id_butCART").onclick=function()
{
    if(catst)
        {
            document.getElementById("id_secCART").style.display="none";
        }
    else
        {
            document.getElementById("id_secCART").style.display="block";
        }
        catst = !catst;
}



// document.getElementById("id_butORD").onclick=function()
// {
//     if(ordst)
//         {
//             document.getElementById("id_secORDER").style.display="none";
//         }
//     else
//         {
//             document.getElementById("id_secORDER").style.display="block";
//         }
//         ordst = !ordst;
// }