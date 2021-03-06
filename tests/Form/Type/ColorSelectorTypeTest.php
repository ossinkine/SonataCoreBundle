<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CoreBundle\Tests\Form\Type;

use Sonata\CoreBundle\Color\Colors;
use Sonata\CoreBundle\Form\FormHelper;
use Sonata\CoreBundle\Form\Type\ColorSelectorType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorSelectorTypeTest extends TypeTestCase
{
    /**
     * @group legacy
     */
    public function testBuildForm()
    {
        $formBuilder = $this->getMockBuilder('Symfony\Component\Form\FormBuilder')->disableOriginalConstructor()->getMock();
        $formBuilder
            ->expects($this->any())
            ->method('add')
            ->will($this->returnCallback(function ($name, $type = null) {
                if (null !== $type) {
                    $this->assertTrue(class_exists($type), sprintf('Unable to ensure %s is a FQCN', $type));
                }
            }));

        $type = new ColorSelectorType();

        $type->buildForm($formBuilder, [
            'choices' => array_flip(Colors::getAll()),
            'choices_as_values' => true,
            'translation_domain' => 'SonataCoreBundle',
            'preferred_choices' => [
                Colors::BLACK,
                Colors::BLUE,
                Colors::GRAY,
                Colors::GREEN,
                Colors::ORANGE,
                Colors::PINK,
                Colors::PURPLE,
                Colors::RED,
                Colors::WHITE,
                Colors::YELLOW,
            ],
        ]);
    }

    public function testGetParent()
    {
        $form = new ColorSelectorType();

        $parentRef = $form->getParent();

        $this->assertTrue(class_exists($parentRef), sprintf('Unable to ensure %s is a FQCN', $parentRef));
    }

    public function testGetDefaultOptions()
    {
        $type = new ColorSelectorType();

        $this->assertSame('sonata_type_color_selector', $type->getName());
        $this->assertSame(ChoiceType::class, $type->getParent());

        FormHelper::configureOptions($type, $resolver = new OptionsResolver());

        $options = $resolver->resolve();

        $expected = [
            'choices' => array_flip([
                '#F0F8FF' => 'aliceblue',
                '#FAEBD7' => 'antiquewhite',
                '#00FFFF' => 'cyan',
                '#7FFFD4' => 'aquamarine',
                '#F0FFFF' => 'azure',
                '#F5F5DC' => 'beige',
                '#FFE4C4' => 'bisque',
                '#000000' => 'black',
                '#FFEBCD' => 'blanchedalmond',
                '#0000FF' => 'blue',
                '#8A2BE2' => 'blueviolet',
                '#A52A2A' => 'brown',
                '#DEB887' => 'burlywood',
                '#5F9EA0' => 'cadetblue',
                '#7FFF00' => 'chartreuse',
                '#D2691E' => 'chocolate',
                '#FF7F50' => 'coral',
                '#6495ED' => 'cornflowerblue',
                '#FFF8DC' => 'cornsilk',
                '#DC143C' => 'crimson',
                '#00008B' => 'darkblue',
                '#008B8B' => 'darkcyan',
                '#B8860B' => 'darkgoldenrod',
                '#A9A9A9' => 'darkgray',
                '#006400' => 'darkgreen',
                '#BDB76B' => 'darkkhaki',
                '#8B008B' => 'darkmagenta',
                '#556B2F' => 'darkolivegreen',
                '#FF8C00' => 'darkorange',
                '#9932CC' => 'darkorchid',
                '#8B0000' => 'darkred',
                '#E9967A' => 'darksalmon',
                '#8FBC8F' => 'darkseagreen',
                '#483D8B' => 'darkslateblue',
                '#2F4F4F' => 'darkslategray',
                '#00CED1' => 'darkturquoise',
                '#9400D3' => 'darkviolet',
                '#FF1493' => 'deeppink',
                '#00BFFF' => 'deepskyblue',
                '#696969' => 'dimgray',
                '#1E90FF' => 'dodgerblue',
                '#B22222' => 'firebrick',
                '#FFFAF0' => 'floralwhite',
                '#228B22' => 'forestgreen',
                '#FF00FF' => 'magenta',
                '#DCDCDC' => 'gainsboro',
                '#F8F8FF' => 'ghostwhite',
                '#FFD700' => 'gold',
                '#DAA520' => 'goldenrod',
                '#808080' => 'gray',
                '#008000' => 'green',
                '#ADFF2F' => 'greenyellow',
                '#F0FFF0' => 'honeydew',
                '#FF69B4' => 'hotpink',
                '#CD5C5C' => 'indianred',
                '#4B0082' => 'indigo',
                '#FFFFF0' => 'ivory',
                '#F0E68C' => 'khaki',
                '#E6E6FA' => 'lavender',
                '#FFF0F5' => 'lavenderblush',
                '#7CFC00' => 'lawngreen',
                '#FFFACD' => 'lemonchiffon',
                '#ADD8E6' => 'lightblue',
                '#F08080' => 'lightcoral',
                '#E0FFFF' => 'lightcyan',
                '#FAFAD2' => 'lightgoldenrodyellow',
                '#D3D3D3' => 'lightgray',
                '#90EE90' => 'lightgreen',
                '#FFB6C1' => 'lightpink',
                '#FFA07A' => 'lightsalmon',
                '#20B2AA' => 'lightseagreen',
                '#87CEFA' => 'lightskyblue',
                '#778899' => 'lightslategray',
                '#B0C4DE' => 'lightsteelblue',
                '#FFFFE0' => 'lightyellow',
                '#00FF00' => 'lime',
                '#32CD32' => 'limegreen',
                '#FAF0E6' => 'linen',
                '#800000' => 'maroon',
                '#66CDAA' => 'mediumaquamarine',
                '#0000CD' => 'mediumblue',
                '#BA55D3' => 'mediumorchid',
                '#9370DB' => 'mediumpurple',
                '#3CB371' => 'mediumseagreen',
                '#7B68EE' => 'mediumslateblue',
                '#00FA9A' => 'mediumspringgreen',
                '#48D1CC' => 'mediumturquoise',
                '#C71585' => 'mediumvioletred',
                '#191970' => 'midnightblue',
                '#F5FFFA' => 'mintcream',
                '#FFE4E1' => 'mistyrose',
                '#FFE4B5' => 'moccasin',
                '#FFDEAD' => 'navajowhite',
                '#000080' => 'navy',
                '#FDF5E6' => 'oldlace',
                '#808000' => 'olive',
                '#6B8E23' => 'olivedrab',
                '#FFA500' => 'orange',
                '#FF4500' => 'orangered',
                '#DA70D6' => 'orchid',
                '#EEE8AA' => 'palegoldenrod',
                '#98FB98' => 'palegreen',
                '#AFEEEE' => 'paleturquoise',
                '#DB7093' => 'palevioletred',
                '#FFEFD5' => 'papayawhip',
                '#FFDAB9' => 'peachpuff',
                '#CD853F' => 'peru',
                '#FFC0CB' => 'pink',
                '#DDA0DD' => 'plum',
                '#B0E0E6' => 'powderblue',
                '#800080' => 'purple',
                '#663399' => 'rebeccapurple',
                '#FF0000' => 'red',
                '#BC8F8F' => 'rosybrown',
                '#4169E1' => 'royalblue',
                '#8B4513' => 'saddlebrown',
                '#FA8072' => 'salmon',
                '#F4A460' => 'sandybrown',
                '#2E8B57' => 'seagreen',
                '#FFF5EE' => 'seashell',
                '#A0522D' => 'sienna',
                '#C0C0C0' => 'silver',
                '#87CEEB' => 'skyblue',
                '#6A5ACD' => 'slateblue',
                '#708090' => 'slategray',
                '#FFFAFA' => 'snow',
                '#00FF7F' => 'springgreen',
                '#4682B4' => 'steelblue',
                '#D2B48C' => 'tan',
                '#008080' => 'teal',
                '#D8BFD8' => 'thistle',
                '#FF6347' => 'tomato',
                '#40E0D0' => 'turquoise',
                '#EE82EE' => 'violet',
                '#F5DEB3' => 'wheat',
                '#FFFFFF' => 'white',
                '#F5F5F5' => 'whitesmoke',
                '#FFFF00' => 'yellow',
                '#9ACD32' => 'yellowgreen',
            ]),
            'choices_as_values' => true,
            'translation_domain' => 'SonataCoreBundle',
            'preferred_choices' => [
                '#000000',
                '#0000FF',
                '#808080',
                '#008000',
                '#FFA500',
                '#FFC0CB',
                '#800080',
                '#FF0000',
                '#FFFFFF',
                '#FFFF00',
            ],
        ];

        $this->assertSame($expected, $options);
    }
}
