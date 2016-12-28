
	var tabIndex=false;
    function SelectMenu(index) {   
	if (tabIndex===false)
     tabIndex=index
 
        for (i = 1; i <= 7; i++) 
        {
            if (i == index)
                continue;
            if (document.getElementById("sub_menu_" + i) && document.getElementById("sub_menu_" + i).style.display != "none")
                document.getElementById("sub_menu_" + i).style.display = "none";
                
            if(i == tabIndex)
                continue;
                
            if (document.getElementById("menu_" + i) && document.getElementById("menu_" + i).className != "mainmenu")
                document.getElementById("menu_" + i).className = "mainmenu";
         }
 
        if (document.getElementById("sub_menu_" + index) && document.getElementById("sub_menu_" + index).style.display != "block")
            document.getElementById("sub_menu_" + index).style.display = "block";
        else if(tabIndex == 0) 
            document.getElementById("sub_menu_1").style.display = "block";
            
        if (document.getElementById("menu_" + index) && document.getElementById("menu_" + index).className != "CurMenu") {
            document.getElementById("menu_" + index).className = "CurMenu";
        }
    }
    
    function HideAllMenu() 
    {
        for (i = 1; i <= 7; i++) {
            if (i == tabIndex)
                continue;
            if (document.getElementById("sub_menu_" + i) && document.getElementById("sub_menu_" + i).style.display == "block")
                document.getElementById("sub_menu_" + i).style.display = "none";
            if (document.getElementById("menu_" + i) && document.getElementById("menu_" + i).className != "mainmenu")
                document.getElementById("menu_" + i).className = "mainmenu";
        }
         if (document.getElementById("sub_menu_" + tabIndex))
            document.getElementById("sub_menu_" + tabIndex).style.display = "block";
         else
            document.getElementById("sub_menu_1").style.display = "block";
        
          if (document.getElementById("menu_" + tabIndex) && document.getElementById("menu_" + tabIndex).className != "CurMenu") 
            document.getElementById("menu_" + tabIndex).className = "CurMenu";
    }
      
    function HideMenu(e, subMenuElementID)
    {
        if(!isMouseToSubMenu(e, subMenuElementID))
        HideAllMenu();
    } 
    
    function HideSubMenu(e, handler)
    {
        if(isMouseLeaveOrEnter(e, handler))
        {
 
        HideAllMenu();
        }
    } 
    
 
    function isMouseLeaveOrEnter(e, handler)
    {
      if (e.type != 'mouseout' && e.type != 'mouseover') return false;
       var reltg = e.relatedTarget ? e.relatedTarget : e.type == 'mouseout' ? e.toElement : e.fromElement;
       while (reltg && reltg != handler)
                 reltg = reltg.parentNode;
       return (reltg != handler);
    }
 
    function isMouseToSubMenu(e, subMenuElementID)
    {
     if (e.type != 'mouseout')
        return false;
     var reltg = e.relatedTarget ? e.relatedTarget : e.toElement;
     while(reltg && reltg.id != subMenuElementID)
        reltg = reltg.parentNode;
       
      return reltg;
    }