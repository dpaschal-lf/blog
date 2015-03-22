<section id="create_container">
    <form id="create_blog_post_form" name="create_blog_post" method="post" enctype="multipart/form-data">
        <section class="row">
            <div class="sidebyside col-md-8">

                <input type="text" placeholder="Blog Title" name="title">
                <select name="category" placeholder="Select category">
                    <option val="1">Technology</option>
                    <option val="2">Society</option>
                    <option val="3">History</option>
                    <option val="4">Law</option>
                </select>
           </div> 
            <div class="sidebyside col-md-4">
                <button type="button" id="post_publish_button" class="btn btn-default">Publish</button>
                <button type="button" id="post_save_button" class="btn btn-default">Save Draft</button>
            </div>
        </section>
        <section class="row">
            <div class="col-md-3">
                <div class="row"><textarea placeholder="Summary (if different from post)"></textarea></div>
                <div class="row"><input type="file" name="image"></div>
            </div>
            <div class="col-md-9">
                <textarea id="blog_contents_textarea" class="tinymce_me" name="blog_contents_textarea" placeholder="Enter your blog post content here"></textarea>
            </div>
        </section>
    </form>
</section>
<script>
    $("#post_publish_button").click(function(){
        create_edit_post(this);
    });
    $("#post_save_button").click(function(){
        create_edit_post(this);
    });
</script>