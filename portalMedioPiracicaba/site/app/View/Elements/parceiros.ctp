<script type="text/javascript">
$(window).load(function () {
$("#s1").endlessScroll({ 
width: '100%', // Desired div's width.
//height: '100px', // Desired div's height.
steps: -2, // pixel step for the scrolling, also controls the direction, a negatif value (left), a positive value (right).
speed: 40, // animation speed, from 0 (quicker) to infinite (slower).
mousestop: true }); //if set to true the scrolling stops when the mouse is over the div.
});
</script>

<div id="s1" class="is">
  <?php $count = 0;
    for ($i=0; $i < 12; $i++) {  
      if (count($parceiros) == $count) {
        $count = 0;
      }
      echo '<a href="'.$parceiros[$count]['Parceiro']['site'].'" target="_blank" escape="false">';
      echo $this->Html->image($parceiros[$count]['Parceiro']['foto'], array('id' => 'pLogo'));
      echo '</a>';

      $count++;
    }
  ?>  
</div>