$(document).ready(function () {

    var options = {
        selector: '.photo img',
        zoom: true,
	    thumbnail: true,
	    exThumbImage: 'data-thumbnail'
    };
    var $photoList = $('.photo-list');

    $photoList.lightGallery(options);

    $photoList.on('onCloseAfter.lg', function(event, prevIndex, index){
        $photoList.data('lightGallery').destroy(true);
        $photoList.lightGallery(options);
    });

    let wrapper = $('.header-bottom__buttons');


    wrapper.on('click', '.publish-photo', function () {

        let nominationid = $('[data-report-name="nomination"]').val();

        let list = getListSelected();

        let sList = list.join(',');
        var data = {
            list: sList,
            type: "publish",
            nominationid: nominationid,

        };
        sendRequest(data, list, 'changeStatus');
    });

    wrapper.on('click', '.disqualify-photo', function () {

        let nominationid = $('[data-report-name="nomination"]').val();
        let list = getListSelected();
        let sList = list.join(',');

        var data = {
            list: sList,
            type: "disqualify",
            nominationid: nominationid,
        };

        sendRequest(data, list, 'changeStatus');

    });

    wrapper.on('click', '.download-photo', function () {

        let list = getListSelected();
        var data = {
            list: list.join(','),
            type: "download",
        };

        sendRequest(data, list, 'downloadFiles');

    })


    var getListSelected = function () {

        let ids = [];
        let listItems = $('.photo-list').find('.photo input[type=checkbox]:checked');
        $.each(listItems, function (i, val) {
            ids.push($(val).data('reportitem'));
        });
        return ids;

    };

    var downloadFiles = function(data) {

        $.fileDownload(data)
            .done(function () { alert('File download a success!'); })
            .fail(function () { alert('File download failed!'); });
    };

    var changeStatus = function (data,items) {

        let cnt = 0;

        let def = $('[data-def-tab]').data('def-tab');

        $.each(data.ITEMS, function (i, val) {
            if (val === def)
                cnt++;
        });

        let itemsCount =  $('.photo-list .photo').length;

        if (cnt < itemsCount) {

            $.each(items, function (i, val) {
                $('[data-element-id=' + val + ']').remove();
            });

        }

        if (cnt === 0) {

            $('.nominations-menu .item.active .number').remove();
            $('.right-tab .navigation .tab.active .number').remove();

        } else {

            $('.nominations-menu .item.active .number').text(cnt);
            $('.right-tab .navigation .tab.active .number').text(cnt);
        }

        window.onElementUnChecked = true;
        window.onElementChecked = false;

        $('.btn.pick-photo.active').removeClass('active');
        $('.photo-list.layout-table.selectable').removeClass('selectable');

        $(document).trigger('onElementUnChecked');
    }


    var sendRequest = function (data, items, method) {

        BX.ajax.runComponentAction('runetsoft:voting.report', method, {
            mode: 'class',
            data: data
        }).then(function (response) {

            if (response.status === 'success') {

                if(method === 'downloadFiles')
                    downloadFiles(response.data);
                else if(method === 'changeStatus')
                    changeStatus(response.data,items)

            } else {
                console.error(response.errors);
            }

        });

        return false;


    }


})