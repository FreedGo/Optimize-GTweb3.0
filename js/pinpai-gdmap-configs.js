//地图初始化时，在地图上添加一个marker标记,鼠标点击marker可弹出自定义的信息窗体
    var map = new AMap.Map("container", {
        resizeEnable: true,
        zoom: 6
    });   
    geocoder(getAddress);
    function geocoder(address) {
        var geocoder = new AMap.Geocoder({
            city: "", //城市，默认：“全国”
            radius: 2000 //范围，默认：500

        });
        //地理编码,返回地理编码结果
        geocoder.getLocation(address, function(status, result) {
            if (status === 'complete' && result.info === 'OK') {
                // console.log(result.geocodes);
                addMarker(result.geocodes);
            }
        });
    };
    //添加marker标记
    function addMarker(data) {
        map.clearMap();
        var marker = new AMap.Marker({
            map: map,
            position: [data[0].location.getLng(), data[0].location.getLat()]
        });
        infoWindow.open(map, marker.getPosition());
        //鼠标点击marker弹出自定义的信息窗体
        AMap.event.addListener(marker, 'click', function() {
            infoWindow.open(map, marker.getPosition());
        });
    }
    
    //实例化信息窗体
    var title = getTitle,
        content = [];
    content.push("<img src="+getImgUrl+">地址："+getAddress);
    content.push("电话："+getPhoneNum);
    content.push("<a href="+getWebSide+">详细信息</a>");
    var infoWindow = new AMap.InfoWindow({
        isCustom: true,  //使用自定义窗体
        content: createInfoWindow(title, content.join("<br/>")),
        offset: new AMap.Pixel(16, -45)
    });

    //构建自定义信息窗体
    function createInfoWindow(title, content) {
        var info = document.createElement("div");
        info.className = "info1";

        //可以通过下面的方式修改自定义窗体的宽高
        //info.style.width = "400px";
        // 定义顶部标题
        var top = document.createElement("div");
        var titleD = document.createElement("div");
        var closeX = document.createElement("img");
        top.className = "info-top";
        titleD.innerHTML = title;
        closeX.src = "http://webapi.amap.com/images/close2.gif";
        closeX.onclick = closeInfoWindow;

        top.appendChild(titleD);
        top.appendChild(closeX);
        info.appendChild(top);

        // 定义中部内容
        var middle = document.createElement("div");
        middle.className = "info-middle";
        middle.style.backgroundColor = 'white';
        middle.innerHTML = content;
        info.appendChild(middle);

        // 定义底部内容
        var bottom = document.createElement("div");
        bottom.className = "info-bottom";
        bottom.style.position = 'relative';
        bottom.style.top = '0px';
        bottom.style.margin = '0 auto';
        var sharp = document.createElement("img");
        sharp.src = "http://webapi.amap.com/images/sharp.png";
        bottom.appendChild(sharp);
        info.appendChild(bottom);
        return info;
    }

    //关闭信息窗体
    function closeInfoWindow() {
        map.clearInfoWindow();
    }