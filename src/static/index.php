<div class="tabs__section">
  <div class="tabs__container container-width">
    <div class="tabs__navigation">
    <?php if( have_rows('tabs') ): ?>
        <ul class="tabs__list">
          <svg width="28" height="16" viewBox="0 0 28 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L14 14L27 1" stroke="black" stroke-width="2"/>
          </svg>
        <?php while( have_rows('tabs') ): the_row(); ?>
            <li class="tabs__list-item" data-tab-target="<?php the_sub_field('tab_id'); ?>"><?php the_sub_field('tab_title'); ?></li>
        <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    </div>
    <div class="tabs__content">
        <!--цикл -->
      <?php if( have_rows('tabs') ): ?>
        <?php while( have_rows('tabs') ): the_row(); ?>
            <div class="tabs__content-block" id="<?php the_sub_field('tab_id'); ?>">
              <!--цикл -->
              <?php if( have_rows('item_card') ): ?>
                <div class="tabs__content-wrapper">
                <?php while( have_rows('item_card') ): the_row(); 
                $boxColor = get_sub_field('box-color');           
                ?>
                <div class="tabs__content-box <?php echo $boxColor ?>">
                  <h2 class="tabs__content-title"><?php the_sub_field('title')?></h2>
                  <p class="tabs__content-text"><?php the_sub_field('text')?></p>
                  <?php if( have_rows('description') ): ?>
                    <ul class="tabs__content-list">
                    <?php while( have_rows('description') ): the_row(); ?>
                      <li class="tabs__content-item"><?php the_sub_field('element')?></li>
                    <?php endwhile; ?>
                    </ul>
                  <?php endif; ?>
                  <a href="<?php the_sub_field('link')?>" class="tabs__content-btn">Tryck här för att gå till beställning</a>
                </div>
                <?php endwhile; ?>
                </div>
              <?php endif; ?>
              <?php if( have_rows('item_card') ): ?>
                <?php while( have_rows('item_card') ): the_row(); 
                $image1 = get_sub_field('image_1');
                $image2 = get_sub_field('main_image');
                $image3 = get_sub_field('image_3');
                ?>
                <div class="tabs__content-image">
                    <span class="tabs__content-image-text">Tryck här för att gå till beställning</span>
                    <img src="<?php echo $image1['url']?>" class="tabs__content-thumbnail image__1" alt="<?php  echo $image1['alt']?>">
                    <img src="<?php echo $image2['url']?>" class="tabs__content-thumbnail image__main" alt="<?php  echo $image2['alt']?>">
                    <img src="<?php echo $image3['url']?>" class="tabs__content-thumbnail image__3" alt="<?php  echo $image3['alt']?>">
                </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</div>



<style>
  @import url("https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap");
  .tabs__section {
    padding: 40px 0;
  }

  .tabs__navigation {
    margin-bottom: 40px;
  }
  .tabs__list {
    display: flex;
    gap: 40px;
  }
  .tabs__list svg {
    display: none;
  }
  .tabs__list-item {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 16px 15px;
    border: 1px solid #FFFFFF;
    border-radius: 10px;
    min-width: 165px;
    height: 61px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 29px;
    color: #000000;
    background: radial-gradient(circle at 100% 100%, #ffffff 0, #ffffff 9px, transparent 9px) 0% 0%/10px 10px no-repeat,
            radial-gradient(circle at 0 100%, #ffffff 0, #ffffff 9px, transparent 9px) 100% 0%/10px 10px no-repeat,
            radial-gradient(circle at 100% 0, #ffffff 0, #ffffff 9px, transparent 9px) 0% 100%/10px 10px no-repeat,
            radial-gradient(circle at 0 0, #ffffff 0, #ffffff 9px, transparent 9px) 100% 100%/10px 10px no-repeat,
            linear-gradient(#ffffff, #ffffff) 50% 50%/calc(100% - 2px) calc(100% - 20px) no-repeat,
            linear-gradient(#ffffff, #ffffff) 50% 50%/calc(100% - 20px) calc(100% - 2px) no-repeat,
            linear-gradient(90deg, #ff8b13 41.28%, #fcc10f 114.1%);
    box-sizing: border-box;
  }
  .tabs__list-item.active {
    background: linear-gradient(90deg, #FF8B13 41.28%, #FCC10F 114.1%);
  }
  .tabs__content {
    overflow: hidden;
  }
  .tabs__content-block {
    display: none;
    opacity: 0;
    transition: 1s all;
    transform: translate3d(-100%,0,0);
  }
  .tabs__content-block.active {
    display: flex;
    opacity: 1;
    transform: translate3d(0,0,0);
    gap:30px;
  }
  .tabs__content-wrapper {
    width: calc(50% - 15px);
    display: flex;
    flex-wrap:wrap;
  }
  .tabs__content-box {
    border-radius: 10px;
    padding: 12px;
    display: flex;
    flex-direction: column;
    gap:20px;
    justify-content: space-between;
  }
  .tabs__content-box.yellow {
    background: #F7C04A;
  }
  .tabs__content-box.blue {
    background: #00235B;
    
  }
  .tabs__content-box.blue .tabs__content-btn, .tabs__content-box.green .tabs__content-title {
    color: #FFFFFF;
  }
  .tabs__content-box.green {
    background: #539165;
  }
  .tabs__content-box.green .tabs__content-btn, .tabs__content-box.green .tabs__content-title {
    color: #FFFFFF;
  }
  .tabs__content-box.gray{
    background: #F8F5E4;
  }
  .tabs__content-title {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    line-height: 100%;
    letter-spacing: 0.005em;
    color: #000000;
    text-align: center;
  }
  .tabs__content-text {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 150%;
    color: #000000;
  }
  .tabs__content-list {
  }
  .tabs__content-item {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 150%;
    color: #000000;
  }
  .tabs__content-btn {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    text-decoration-line: underline;
    color: #000000;
  }
  .tabs__content-image {
    width: calc(50% - 15px);
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    position: relative;
  }
  .tabs__content-image-text {
    position: absolute;
    background: linear-gradient(90deg, #FF8B13 41.28%, #FCC10F 114.1%);
    border: 1px solid #FFFFFF;
    border-radius: 10px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 29px;
    color: #000000;
    width: 46.2%;
    padding: 16px;
    right: 12px;
  }
  .tabs__content-thumbnail {
    width: 100%;
    height: 100%;
    object-fit:cover;
    object-position:center;
  }
  .tabs__content-thumbnail.image__1{
    grid-area: 1 / 1 / 2 / 2;
  }
  .tabs__content-thumbnail.image__main{
    grid-area: 1 / 2 / 3 / 3; 
  }
  .tabs__content-thumbnail.image__3{
    grid-area: 2 / 1 / 3 / 2; 
  }
  @media(max-width:992px){
    .tabs__section {
      padding: 30px 0;
    }
    .tabs__content-wrapper {
      flex-direction: column;
      gap:32px;
      width: 100%;
    }
    .tabs__content-image {
      width: 100%;
    }
    .tabs__content-image-text {
      left:12px;
      margin: 0 auto;
      width: 280px;
    }
    .tabs__content-thumbnail.image__1, .tabs__content-thumbnail.image__3 {
      display: none;
    }
    .tabs__list-item {
      order:2;
      display: none;
      background: linear-gradient(90deg, #FF8B13 41.28%, #FCC10F 114.1%);
      border: 1px solid #FFFFFF;
    }
    .tabs__list-item.active {
      order:1;
      display: flex;
      background: linear-gradient(90deg, #FF8B13 41.28%, #FCC10F 114.1%);
      border: 1px solid #FFFFFF;
    }
    .tabs__list svg{
      display: flex;
      margin-left: auto;
      transition: 0.5s all;
    }
    .tabs__list.active {
      transform: rotate(180deg);
    }
  }
</style>

<script>
  const tabsList = document.querySelectorAll(".tabs__list");
  const tabsListItem = document.querySelectorAll(".tabs__list-item");
  const tabsContentBlock = document.querySelectorAll(".tabs__content-block");
  const removeClass = (element) => {
    element.forEach(elem => {
      elem.classList.remove('active');
    });
  }
  // делает первый таб активным
  tabsList.forEach(i => {
    const liFirst = i.getElementsByTagName("li")[0];
    tabItem = i.document.querySelectorAll('li');
    liFirst.classList.add("active");

    tabItem.forEach(item=>{
      item.addEventListener('click', ()=>{
        i.classList.toogle('active');
      });
    });
  });
  tabsContentBlock[0].classList.add("active")
  tabsListItem.forEach(item => {
    item.addEventListener("click", () => {
      removeClass(tabsListItem);
      item.classList.add('active');
      const tabTargetAttr = item.getAttribute("data-tab-target");
      const tabTarget = document.getElementById(tabTargetAttr);

      removeClass(tabsContentBlock);
      tabTarget.classList.add('active');

    });
  });
</script>