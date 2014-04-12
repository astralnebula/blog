<?

echo form_open('contact/send');
echo form_textarea('msg','Message','class="form-control"');
echo form_submit('','Send Message!','class="form-control"');