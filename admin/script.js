var infost = false;

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

function set_doc_content()
{
    alert("clicked");
    document.getElementById("id_disp").textContent = value;
}