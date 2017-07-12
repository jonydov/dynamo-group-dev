<?php
/*
    Template Name: Pricing
*/

get_header();

?>

<?php if ( have_rows( 'content_sections' ) ): while ( have_rows( 'content_sections' ) ) : the_row(); ?>

	<?php if ( get_row_layout() == 'full_width_image' ) { ?>

        <section class="section-full-width-image">

			<?php if ( get_sub_field( 'image' ) != null ) { ?>
                <div class="bg-img skrollable" data-top="transform: translateY(5%);"
                     data-top-bottom="transform: translateY(-10%);"
                     style="background-image: url('<?= get_sub_field( 'image' ); ?>');"></div>
			<?php } ?>
            <div class="shell">
                <div class="holder">
					<?php if ( get_sub_field( 'text' ) != null ) { ?>
                    <<?php the_sub_field( 'text_type' ); ?> class="animate fade-top" data-delay="100">
					<?php the_sub_field( 'text' ); ?>
                </<?php the_sub_field( 'text_type' ); ?>>
				<?php } ?>

				<?php if ( get_sub_field( 'text' ) != null ) { ?>
                    <div class="text animate fade-bottom" data-delay="100">
						<?php the_sub_field( 'subtext' ); ?>
                    </div>
				<?php } ?>
            </div>
            </div>

        </section>

	<?php } elseif ( get_row_layout() == 'pricing_generator' ) { ?>

        <section class="section-pricing-generator">

            <div class="form-holder">

                <div class="field-holder animate fade-left" data-delay="100" id="field-location">
                    <div class="label">אולם</div>
                    <div class="select">
                        <span class="selected">גלריה לורנס</span>
                        <ul class="values">
                            <li>גלריה לורנס</li>
                            <li>ריברסייד</li>
                            <li>גלריה דובנוב</li>
                            <li>היי אנד</li>
                        </ul>
                    </div>
                </div>

                <div class="field-holder animate fade-right" data-delay="100" id="field-event-type">
                    <div class="label">סוג האירוע</div>
                    <div class="select">
                        <span class="selected">חתונה</span>
                        <ul class="values">
                            <li>חתונה</li>
                            <li>בת מצווה</li>
                            <li>ערב חברה</li>
                            <li>אחר</li>
                        </ul>
                    </div>
                </div>

                <div class="field-holder animate fade-left" data-delay="100" id="field-date">
                    <div class="label">סוג האירוע</div>
                    <div class="date">
                        <span class="selected">
                            <span class="day">10</span>
                            <span class="in">ב</span>
                            <span class="month">אוגוסט</span>
                            <span class="year">2017</span>
                        </span>
                        <ul class="values">
                            <li class="year">
                                <span>שנה</span>
                                <select class="select-year">
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </li>
                            <li class="month">
                                <span>חודש</span>
                                <select class="select-month">
                                    <option value="ינואר">ינואר</option>
                                    <option value="פברואר">פברואר</option>
                                    <option value="מרץ">מרץ</option>
                                    <option value="אפריל">אפריל</option>
                                    <option value="מאי">מאי</option>
                                    <option value="יוני">יוני</option>
                                    <option value="יולי">יולי</option>
                                    <option value="אוגוסט">אוגוסט</option>
                                    <option value="ספטמבר">ספטמבר</option>
                                    <option value="אוקטובר">אוקטובר</option>
                                    <option value="נובמבר">נובמבר</option>
                                    <option value="דצמבר">דצמבר</option>
                                </select>
                            </li>
                            <li class="day">
                                <span>יום</span>
                                <select class="select-day">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="9">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </li>
                            <button class="btn">בחר</button>
                        </ul>
                    </div>
                </div>

                <div class="field-holder animate fade-right" data-delay="100" id="field-event-size">
                    <div class="label">כמות אורחים</div>
                    <div class="select">
                        <span class="selected">עד 100</span>
                        <ul class="values">
                            <li>עד 100</li>
                            <li>100-200</li>
                            <li>200-300</li>
                            <li>מעל 300</li>
                        </ul>
                    </div>
                </div>

                <div class="field-holder animate fade-left" data-delay="100" id="field-event-time">
                    <div class="label">שעות האירוע</div>
                    <div class="select">
                        <span class="selected">בוקר</span>
                        <ul class="values">
                            <li>בוקר</li>
                            <li>צהרים</li>
                            <li>ערב</li>
                            <li>יום שלם</li>
                        </ul>
                    </div>
                </div>

                <div class="field-holder animate fade-right" data-delay="100" id="field-menu-type">
                    <div class="label">התפריט הרצוי</div>
                    <div class="select">
                        <span class="selected">ארוחת בוקר</span>
                        <ul class="values">
                            <li>ארוחת בוקר</li>
                            <li>בראנץ'</li>
                            <li>ארוחת צהרים</li>
                            <li>ארוחת ערב</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="subsection-total animate fade-right" data-delay="100">
                <div class="holder">
                    <div class="calculator">
                        <h3>סיכום עלות משוערת:</h3>
                        <div class="subtotal">390<span>₪</span></div>
                        <span>לאורח</span>
                    </div>

                    <div class="disclaimer">
                        * העלות אינה כוללת חניה במידת הצורך<br/>
                            * תוספת עבור יום חמישי.<br/>
                            * המחירים לא כוללים מע״מ.
                    </div>
                </div>
            </div>

        </section>

	<?php } ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
