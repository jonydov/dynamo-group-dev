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
                    <div class="label">מקום</div>
                    <div class="select">
                        <span class="selected">גלריה לורנס</span>
                        <ul class="values">
                            <li>הלורנס</li>
                            <li>ריברסייד</li>
                            <li>גלריה דובנוב</li>
                            <li>היי אנד</li>
                        </ul>
                    </div>
                </div>

                <div class="field-holder animate fade-right" data-delay="100" id="field-event-type">
                    <div class="label">סוג האירוע</div>
                    <div class="select">
                        <span class="selected">אירוע פרטי</span>
                        <ul class="values">
                            <li>אירוע פרטי</li>
                            <li>אירוע עסקי</li>
                        </ul>
                    </div>
                </div>

                <div class="field-holder animate fade-left" data-delay="100" id="field-date">
                    <div class="label">תאריך האירוע</div>
                    <div class="date">
                        <span class="selected">
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
                            <li>בוקר קל</li>
                            <li>בראנץ'</li>
                            <li>ארוחת צהריים</li>
                            <li>קוקטייל</li>
                            <li>ארוחת ערב</li>
                            <li>מסיבה</li>
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
