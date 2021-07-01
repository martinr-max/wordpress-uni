function makeReadOnly(thisnote) {
    thisnote.find('.edit-note').html('Edit')
            thisnote.find('#note-title, #note-content')
            .attr('readonly','readonly')
            .removeClass('note-active-field')
            thisnote.find('.update-note').removeClass('update-note-visible')
            thisnote.data('state', 'cancel')
}

function makeEditable(thisnote) {
    thisnote.find('.edit-note').html('Cancel')
    thisnote.find('#note-title, #note-content')
    .removeAttr('readonly')
    .addClass('note-active-field')
    thisnote.data('state', 'editable')
    thisnote.find('.update-note').addClass('update-note-visible')
}

jQuery(document).ready(function(){

    jQuery(".delete-note").click((e) => {
       let thisnote = jQuery(e.target).parents('li');
       jQuery.ajax({
           beforeSend: (xhr) => {
            xhr.setRequestHeader('X-WP-nonce', universityData.nonce);
           }, 
           url: `http://localhost:8888/wordpress/wp-json/wp/v2/note/${thisnote.data('id')}`,
           type: 'DELETE',
           success: (response) => {
               thisnote.slideUp();
               console.log('congrats');
               console.log(response)
           },
           error: (response) => {
            console.log('sorry');
            console.log(response)
            }
       })
    });

    jQuery(".edit-note").click((e) => {
    let thisnote = jQuery(e.target).parents('li');
    if(thisnote.data('state') != 'editable') {
        thisnote.find('.edit-note').html('Cancel')
        thisnote.find('#note-title, #note-content')
        .removeAttr('readonly')
        .addClass('note-active-field')
        thisnote.data('state', 'editable')
        thisnote.find('.update-note').addClass('update-note-visible')

    }
    else {
        thisnote.find('.edit-note').html('Edit')
        thisnote.find('#note-title, #note-content')
        .attr('readonly','readonly')
        .removeClass('note-active-field')
        thisnote.find('.update-note').removeClass('update-note-visible')
        thisnote.data('state', 'cancel')
    }  
    })

    jQuery(".update-note").click((e) => {
        let thisnote = jQuery(e.target).parents('li');
        let editedPost = {
            'title': thisnote.find('.note-title-field').val(),
            'content': thisnote.find('.note-content-field').val()
        }
       
        jQuery.ajax({
            beforeSend: (xhr) => {
             xhr.setRequestHeader('X-WP-nonce', universityData.nonce);
            }, 
            url: `http://localhost:8888/wordpress/wp-json/wp/v2/note/${thisnote.data('id')}`,
            type: 'POST',
            data: editedPost,
            success: (response) => {
                makeReadOnly(thisnote);
                console.log('congrats');
                console.log(response)
            },
            error: (response) => {
             console.log('sorry');
             console.log(response)
             }
        })
     });

    jQuery('.create-save-note-btn').click(() => {
        let newPost = {
            'title': jQuery('.create-note-title').val(),
            'content':  jQuery('.create-note-content').val(),
            'status': 'publish'
        }
       
        jQuery.ajax({
            beforeSend: (xhr) => {
             xhr.setRequestHeader('X-WP-nonce', universityData.nonce);
            }, 
            url: `http://localhost:8888/wordpress/wp-json/wp/v2/note/`,
            type: 'POST',
            data: newPost,
            success: (response) => {
                jQuery('.create-note-title, .create-note-content').val('')
                jQuery(`
                <li data-id="${response.id}" class="note-item">
      
                <div class="note-generic-content">
                <div class="note-header">
                  <input class="heading-1" class="note-title-field" id="note-title" value="${response.title.raw}" readonly>
                  <div class="note-buttons">
                      <span class="btn edit-note"> <i class="fa fa-pencil"></i>Edit </span>
                      <span class="btn delete-note"> <i class="fa fa-trash-o"></i> Delete </span>
                  </div>    
                  </div>
                  <textarea class="note-content-field" id="note-content" rows="15" readonly>
                  ${response.content.raw}
                  </textarea>
                </div>
                <span class="btn update-note"> <i class="fa fa-pencil"></i> save </span>
          
            </li>
                `)
                .prependTo('.note-list')
                .hide()
                .slideDown()
                console.log('congrats');
                console.log(response)
            },
            error: (response) => {
             console.log('sorry');
             console.log(response)
             }
        })


    });

    
    
});
