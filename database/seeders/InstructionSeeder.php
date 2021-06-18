<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instruction::create([
            'name' => 'Calienta a fuego bajo el sartén con la mantequilla o manteca de cerdo o aceite de coco.',
            'step' => 1,
            'recipe_id' => 1,
        ]);
        Instruction::create([
            'name' => 'Con anterioridad puedes batir los huevos o si deseas directamente en el sartén.',
            'step' => 2,
            'recipe_id' => 1,
        ]);
        Instruction::create([
            'name' => 'Cuando esté espere unos segundos no mas de 20 e incorpora, la cebolla, el tomate, espinacas y sal pimienta al gusto.',
            'step' => 3,
            'recipe_id' => 1,
        ]);
        Instruction::create([
            'name' => 'Deja calentar según tu preferencia blando o duro y antes de cerrar la tortilla agrega el queso.',
            'step' => 4,
            'recipe_id' => 1,
        ]);
        Instruction::create([
            'name' => 'Si deseas antes de servir puedes espolvorear mas queso y un chorrito de aceite de oliva.',
            'step' => 5,
            'recipe_id' => 1,
        ]);

        
        Instruction::create([
            'name' => 'Con anterioridad puedes adobar el salmón con ajo, 1 cucharada de aceite de oliva y sal pimienta al gusto.',
            'step' => 1,
            'recipe_id' => 2,
        ]);
        Instruction::create([
            'name' => 'Para preparar la salsa coloca en un procesador o licuadora el aguacate, ají, aceite de oliva, cilantro, limón, crema agraria, sal y licua',
            'step' => 2,
            'recipe_id' => 2,
        ]);
        Instruction::create([
            'name' => 'Sin apagar la licuadora, añade un poco de agua para que logres la consistencia deseada.',
            'step' => 3,
            'recipe_id' => 2,
        ]);
        Instruction::create([
            'name' => 'Aparte, coloca el salmón en el sartén a fuego alto durante 3 minutos, y después baja la llama y deja freír al gusto.',
            'step' =>4,
            'recipe_id' => 2,
        ]);
        Instruction::create([
            'name' => 'Antes de servir, baña con la salsa anteriormente preparada, (esta salsa puede servirte para pollo, carne o ensaladas) y acompañar con ensalada.',
            'step' => 5,
            'recipe_id' => 2,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca las aceitunas, zuquini y los champiñones.',
            'step' => 6,
            'recipe_id' => 2,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta y baña con un chorrito de aceite de oliva extra-virgen orgánico aromatizado.',
            'step' => 7,
            'recipe_id' => 2,
        ]);

        Instruction::create([
            'name' => 'En un sartén con agua, hierve los huevos durante 17 minutos máximo',
            'step' => 1,
            'recipe_id' => 3,
        ]);
        Instruction::create([
            'name' => 'Una vez estén los huevos, divídelo, retira la yema y deja aparte la clara',
            'step' => 2,
            'recipe_id' => 3,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca la yema, la tocineta, 1 cucharada de aceite de oliva extra virgen, sal pimienta al gusto',
            'step' =>3,
            'recipe_id' => 3,
        ]);
        Instruction::create([
            'name' => 'Machaca con un cubierto hasta que todo quede incorporado',
            'step' => 4,
            'recipe_id' => 3,
        ]);
        Instruction::create([
            'name' => 'Una vez esté listo, rellena con mucho cuidado las claras, espolvorea con el queso y rocía con la otra cucharada de aceite de oliva extra virgen',
            'step' => 5,
            'recipe_id' => 3,
        ]);

        Instruction::create([
            'name' => 'Calienta el sartén con la mantequilla y sofríe el ajo a fuego medio por unos segundos.',
            'step' => 1,
            'recipe_id' => 6,
        ]);
        Instruction::create([
            'name' => 'Con anterioridad, envuelve cada espárrago en las tocinetas e incorpora al sartén con el ajo',
            'step' => 2,
            'recipe_id' => 6,
        ]);
        Instruction::create([
            'name' => 'Cocínalo hasta que dore a fuego bajo.',
            'step' => 3,
            'recipe_id' => 6,
        ]);
        Instruction::create([
            'name' => 'Antes de servir, espolvorear el huevo o la proteína que elegiste y la porción de queso.',
            'step' => 4,
            'recipe_id' => 6,
        ]);

        Instruction::create([
            'name' => 'En un sartén con mantequilla sofríe la cebolla y el ajo.',
            'step' => 1,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Cuando esté dorada, agrega la carne, revuelves y le pones sal pimienta al gusto.',
            'step' => 2,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Revuelve y con la carne a medio hacer, agrega el tomate   y sigue revolviendo.',
            'step' => 3,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Déjala unos minutos más, pero mientras se va cocinando, agrega el orégano y especias, esto si es de tu gusto, o con las especias que estés acostumbrado.',
            'step' => 4,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Esta salsa también la puedes utilizar como base para la pizza de brócoli, coliflor o pollo',
            'step' => 5,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Se deja reposar en el sartén',
            'step' => 6,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Aparte prepara los zuquinis (como se hacen los espaguetis normales) y cuando estén al dente los retiras del agua',
            'step' => 7,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Los pones en un sartén bien caliente con mantequilla por unos segundos para que así queden más crocantes.',
            'step' => 8,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Sirve los espaguetis de zuquini, agrega encima la salsa boloñesa y espolvorea con queso y pimienta.',
            'step' => 9,
            'recipe_id' => 7,
        ]);
        Instruction::create([
            'name' => 'Acompáñalo con ensalada de aguacate y aceitunas bañado en salsa pesto',
            'step' => 10,
            'recipe_id' => 7,
        ]);

        Instruction::create([
            'name' => 'Precalentamos el horno a 160°C',
            'step' => 1,
            'recipe_id' => 8,
        ]);
        Instruction::create([
            'name' => 'En un sartén con manteca se sofríe el ajo y tocineta, se deja por unos segundos',
            'step' => 2,
            'recipe_id' => 8,
        ]);
        Instruction::create([
            'name' => 'Agrega los champiñones y revuelve',
            'step' => 3,
            'recipe_id' => 8,
        ]);
        Instruction::create([
            'name' => 'Una vez todo incorporado colócalo en una refractaria que pueda ir al horno',
            'step' => 4,
            'recipe_id' => 8,
        ]);
        Instruction::create([
            'name' => 'Espolvorea con el queso, huevo y lo dejas en el horno por unos minutos hasta que dore',
            'step' => 5,
            'recipe_id' => 8,
        ]);
        Instruction::create([
            'name' => 'Antes de servir le agregas rociado aceite de oliva',
            'step' => 6,
            'recipe_id' => 8,
        ]);

        Instruction::create([
            'name' => 'Bate cada uno de los huevos por aparte',
            'step' => 1,
            'recipe_id' => 10,
        ]);
        Instruction::create([
            'name' => 'Coloca en un sartén la mantequilla y prepara el primer huevo. Ya batido agrega la sal pimienta al gusto y déjalo como una tapita de sándwich',
            'step' => 2,
            'recipe_id' => 10,
        ]);
        Instruction::create([
            'name' => 'Una vez listo, continúa con el segundo huevo',
            'step' => 3,
            'recipe_id' => 10,
        ]);
        Instruction::create([
            'name' => 'Después a una de estas tapitas de huevo, adiciona la mantequilla, después el queso ya asado o derretido, la lonja de jamón y se cierra con la otra tapa de huevo.',
            'step' => 4,
            'recipe_id' => 10,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 5,
            'recipe_id' => 10,
        ]);

        Instruction::create([
            'name' => 'Sazona el pollo con un poquito de sal, aceite de oliva (o según tu gusto).',
            'step' => 1,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'En la sartén con manteca de cerdo, mantequilla de vaca 100% de pastoreo o aceite de coco, coloca el pollo, lo sellas por lado y lado.',
            'step' => 2,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Una vez tenga el color dorado lo bajas del sartén',
            'step' => 3,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'En ese mismo sartén agrega la cebolla, pimentón, diente de ajo, todo bien picado. Sal pimentamos y dejamos cocinar por 5 minutos removiendo constantemente.',
            'step' => 4,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Pasados estos 5 minutos añade el tomate triturado y hojas de laurel.',
            'step' => 5,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Mezcla todo, remueve por 10 minutos más.  Para este momento el tomate ya se ha reducido',
            'step' => 6,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Déjalo unos dos minutos más y ahí si vuelve añadir el pollo con la taza de caldo, si no se tiene caldo, con agua. Deja cocinar por 40 minutos o hasta que esté bien cocido.',
            'step' => 7,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Al servir espolvoreamos el perejil',
            'step' => 8,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Preparación de la Ensalada',
            'step' => 9,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'En un tazón agrega los vegetales crudos: lechuga, rúgula, champiñones, rábano, acelgas, aceitunas y los trocitos de tocineta, revuelve.',
            'step' => 10,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Añade salpimienta, mayonesa, 1 cucharada aceite de oliva, y todo lo revuelves',
            'step' => 11,
            'recipe_id' => 11,
        ]);
        Instruction::create([
            'name' => 'Al servir lo espolvoreamos con queso parmesano',
            'step' => 12,
            'recipe_id' => 11,
        ]);

        Instruction::create([
            'name' => 'El perejil combínalo con el aceite y déjalo conservar 15 minutos',
            'step' => 1,
            'recipe_id' => 12,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca el atún, chile y aceitunas.',
            'step' => 2,
            'recipe_id' => 12,
        ]);
        Instruction::create([
            'name' => 'Añade sal y pimienta al gusto, mezcla para que se incorpore',
            'step' => 3,
            'recipe_id' => 12,
        ]);
        Instruction::create([
            'name' => 'Después exprime el limón, añade la mayonesa y el aceite de oliva, nuevamente mezcla',
            'step' => 4,
            'recipe_id' => 12,
        ]);
        Instruction::create([
            'name' => 'Al final espolvorea con el queso, si es de tu gusto y sirve',
            'step' => 5,
            'recipe_id' => 12,
        ]);

        Instruction::create([
            'name' => 'Precalentamos el horno a 180°C',
            'step' => 1,
            'recipe_id' => 14,
        ]);
        Instruction::create([
            'name' => 'En un sartén grande agrega un poquito de mantequilla y coloca el hongo hacia abajo, tápalo por dos minutos para que se sople',
            'step' => 2,
            'recipe_id' => 14,
        ]);
        Instruction::create([
            'name' => 'En otro sartén, con un poco más de mantequilla, sofría la tocineta, y espera a que dore. Una vez esté dorada, agrega las espinacas y dejas por unos segundos',
            'step' => 3,
            'recipe_id' => 14,
        ]);
        Instruction::create([
            'name' => 'Apaga, agrega el queso cheddar y revuelve',
            'step' => 4,
            'recipe_id' => 14,
        ]);
        Instruction::create([
            'name' => 'Ya con el hongo listo, lo volteas y lo rellenas con las espinacas y la tocineta',
            'step' => 5,
            'recipe_id' => 14,
        ]);
        Instruction::create([
            'name' => 'Espolvorea con queso parmesano y deja en el horno por unos minutos hasta que dore',
            'step' => 6,
            'recipe_id' => 14,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 7,
            'recipe_id' => 14,
        ]);

        Instruction::create([
            'name' => 'En mortero o machacador coloca el diente de ajo, perejil y lo machacas hasta quedar una masa',
            'step' => 1,
            'recipe_id' => 15,
        ]);
        Instruction::create([
            'name' => 'Añade el zumo de limón, aceite de oliva y mézclalo bien, para que todo se incorpore',
            'step' => 2,
            'recipe_id' => 15,
        ]);
        Instruction::create([
            'name' => 'En una bandeja coloca la trucha abierta apta para el horno a 180°C. Si no hay horno, en un sartén plano a fuego medio bajo y lo sal pimientas al gusto',
            'step' => 3,
            'recipe_id' => 15,
        ]);
        Instruction::create([
            'name' => 'Vierte la mezcla realizada anteriormente sobre la trucha',
            'step' => 4,
            'recipe_id' => 15,
        ]);
        Instruction::create([
            'name' => 'Lo dejas por 12 minutos',
            'step' => 5,
            'recipe_id' => 15,
        ]);
        Instruction::create([
            'name' => 'En un sartén con la mantequilla sofríe el otro ajo y le agregamos el brócoli, lo dejas por unos minutos, según tu gusto. Antes de servir le espolvoreamos queso y aceite de oliva',
            'step' => 6,
            'recipe_id' => 15,
        ]);
        Instruction::create([
            'name' => 'Ya listo, sirve la trucha acompañada de brócoli al ajillo',
            'step' => 7,
            'recipe_id' => 15,
        ]);

        Instruction::create([
            'name' => 'Los huevos en la presentación que desees',
            'step' => 1,
            'recipe_id' => 16,
        ]);
        Instruction::create([
            'name' => 'Opcional de 2 gr. CH, que puedes utilizarlo aquí en la cena',
            'step' => 2,
            'recipe_id' => 16,
        ]);
        Instruction::create([
            'name' => 'Si decides algún vegetal te sugiero 40 gramos de champiñones (1,32 gr. CH) o 40 gramos de espinacas (0,56 gr. CH).',
            'step' => 3,
            'recipe_id' => 16,
        ]);
        Instruction::create([
            'name' => '40 gramos de espárragos que serían 2 (1,56 gr. CH).',
            'step' => 4,
            'recipe_id' => 16,
        ]);
        Instruction::create([
            'name' => 'O 50 gramos de cogollos europeos (0,75 gr. CH) y 7 a 10 aceitunas (1 gr. CH).',
            'step' => 5,
            'recipe_id' => 16,
        ]);

        Instruction::create([
            'name' => 'Una vez estén listos los huevos puyas con el palillo, una aceituna, después el queso y así repite',
            'step' => 1,
            'recipe_id' => 18,
        ]);
        Instruction::create([
            'name' => 'A parte en un tazón combina la crema agria y el queso crema para untar',
            'step' => 2,
            'recipe_id' => 18,
        ]);
        

        Instruction::create([
            'name' => 'Sazona las alitas con un poquito de sal, aceite de oliva y si deseas especies de tu gusto',
            'step' => 1,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Coloca en el sartén con un poco más de aceite de oliva y sella por lado y lado, solo las sellas',
            'step' => 2,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Una vez las alas tengan el color dorado las bajas del sartén',
            'step' => 3,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'En ese mismo sartén y ahora sí con mantequilla, agrega la cebolla, el pimentón, diente de ajo, sal pimientas y deja cocinar por 5 minutos removiendo constantemente',
            'step' => 4,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Pasados estos 5 minutos añade el tomate triturado y la hoja de laurel',
            'step' => 5,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Mezcla todo y remueve por 10 minutos más.',
            'step' => 6,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Para este momento, el tomate ya se ha reducido, lo dejas unos dos minutos más, y ahí si le vuelves añadir las alitas.',
            'step' => 7,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Añádele también, la taza de caldo, si no tienes caldo, con agua, y déjalo cocinar por 40 minutos o hasta que estén bien cocidas.',
            'step' => 8,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Una vez lista sirves las alitas',
            'step' => 9,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Preparación de la ensalada',
            'step' => 11,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca todos los vegetales',
            'step' => 12,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Sal pimientas y mezclas',
            'step' => 13,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Agrégale la crema agria, mayonesa y aceite de oliva y mezcla una vez más',
            'step' => 14,
            'recipe_id' => 19,
        ]);
        Instruction::create([
            'name' => 'Se sirve la ensalada con las alitas ya listas.',
            'step' => 15,
            'recipe_id' => 19,
        ]);

        Instruction::create([
            'name' => 'Coloca todos los ingredientes en un tazón',
            'step' => 1,
            'recipe_id' => 20,
        ]);
        Instruction::create([
            'name' => 'Revuelve todos los productos hasta que queden bien incorporados.',
            'step' => 2,
            'recipe_id' => 20,
        ]);
        Instruction::create([
            'name' => 'Haces bolitas (las que salgan de acuerdo con tu gusto) y las aplanas como una galleta.',
            'step' => 3,
            'recipe_id' => 20,
        ]);
        Instruction::create([
            'name' => 'En un sartén bien caliente y a fuego bajo, pones cada galleta hasta que dore por lado y lado.',
            'step' => 4,
            'recipe_id' => 20,
        ]);
        Instruction::create([
            'name' => '¡A comer!',
            'step' => 5,
            'recipe_id' => 20,
        ]);

        Instruction::create([
            'name' => 'Mezcla los huevos en un tazón, añade la albahaca, sal pimienta y sigue revolviendo hasta que todo esté compenetrado.',
            'step' => 1,
            'recipe_id' => 22,
        ]);
        Instruction::create([
            'name' => 'En un sartén con 2 cucharadas de mantequilla sofríe los tomates por 2 minutos.',
            'step' => 2,
            'recipe_id' => 22,
        ]);
        Instruction::create([
            'name' => 'Añade los huevos sobre los tomates y espera hasta que quede algo firme y agrega el queso.',
            'step' => 3,
            'recipe_id' => 22,
        ]);
        Instruction::create([
            'name' => 'Baja el fuego y tapamos para que se derrita el queso.',
            'step' => 4,
            'recipe_id' => 22,
        ]);
        Instruction::create([
            'name' => 'Antes de servir le roseas 1 cucharada de aceite de oliva extra virgen.',
            'step' => 5,
            'recipe_id' => 22,
        ]);

        Instruction::create([
            'name' => 'Precalentamos el horno a 180°C',
            'step' => 1,
            'recipe_id' => 23,
        ]);
        Instruction::create([
            'name' => 'Con anterioridad sofreímos los tomates en mantequilla por no más de 2 minutos y le agregamos un chorro de aceite de oliva generoso y lo dejamos conservar',
            'step' => 2,
            'recipe_id' => 23,
        ]);
        Instruction::create([
            'name' => 'En un procesador o licuadora colocamos los trozos de pollo, huevo y salpimientas y licua por unos segundos hasta que se forme una pasta húmeda.',
            'step' => 3,
            'recipe_id' => 23,
        ]);
        Instruction::create([
            'name' => 'En una plancha o placa preferiblemente redonda que pueda ir al horno esparce suficiente mantequilla para que cuando extiendas la masa no se pegue.',
            'step' => 4,
            'recipe_id' => 23,
        ]);
        Instruction::create([
            'name' => 'Extiendes bien y le das forma circular a la masa y lleva al horno por 10 minutos y voltea la masa, ojo, debes dejar que esté cocida para que no se parta al voltearla.',
            'step' => 5,
            'recipe_id' => 23,
        ]);
        Instruction::create([
            'name' => 'Ya de vuelta le agregas la mezcla del aceite con tomate por encima de la pizza con una brochita y lo esparces para que quede repartida de forma homogénea.',
            'step' => 6,
            'recipe_id' => 23,
        ]);
        Instruction::create([
            'name' => 'Seguido pones una capa de queso mozzarella y cheddar intercalados y vas repartiendo los ingredientes encima y espolvoreamos con orégano.',
            'step' => 7,
            'recipe_id' => 23,
        ]);
        Instruction::create([
            'name' => 'Por último, regresas al horno y déjalo que se derrita.',
            'step' => 8,
            'recipe_id' => 23,
        ]);

        Instruction::create([
            'name' => 'Precalentamos el horno a 180°c',
            'step' => 1,
            'recipe_id' => 24,
        ]);
        Instruction::create([
            'name' => 'Machaca el ajo, perejil, sal y la mantequilla (previamente pones la mantequilla en un sartén para volverla líquida para que se mezclé bien, unas 2 cucharadas).',
            'step' => 2,
            'recipe_id' => 24,
        ]);
        Instruction::create([
            'name' => 'En un tazón pones los champiñones, el pollo y agrega la mezcla anterior y revuelve (ten cuidado con los champiñones deben quedar enteros).',
            'step' => 3,
            'recipe_id' => 24,
        ]);
        Instruction::create([
            'name' => 'En una refractaria engrasada con un poco de aceite de oliva o mantequilla pones los champiñones, agrégale unos pequeños trocitos de mantequilla bien repartidos y sal pimienta (o con especies de tu gusto).',
            'step' => 4,
            'recipe_id' => 24,
        ]);
        Instruction::create([
            'name' => 'Deja en el horno por unos 10 a 15 minutos o cuando estén bien hechos pero jugosos (recuerda que el pollo ya estaba cocido).',
            'step' => 5,
            'recipe_id' => 24,
        ]);

        Instruction::create([
            'name' => 'Bate los huevos y salpimienta al gusto.',
            'step' => 1,
            'recipe_id' => 25,
        ]);
        Instruction::create([
            'name' => 'En un sartén coloca la mantequilla unos segundos a calentar y pon los huevos ya batidos, no los revuelves pues deben quedar en forma de tortilla',
            'step' => 2,
            'recipe_id' => 25,
        ]);
        Instruction::create([
            'name' => 'Cuando veas que está casi listo, se agrega el jamón y el queso y se dobla.',
            'step' => 3,
            'recipe_id' => 25,
        ]);
        Instruction::create([
            'name' => 'Se deja por 1 minuto más, se tapa y apaga para que con el calor se derrita el queso.',
            'step' => 4,
            'recipe_id' => 25,
        ]);

        Instruction::create([
            'name' => 'En un sartén con 3 cucharadas de mantequilla a fuego lento, coloca a sofreír la cebolla y ajo.',
            'step' => 1,
            'recipe_id' => 26,
        ]);
        Instruction::create([
            'name' => 'Deja cocinar por unos minutos (no más de tres) y agrega los camarones, removiendo lentamente, apagas y lo dejas tapado.',
            'step' => 2,
            'recipe_id' => 26,
        ]);
        Instruction::create([
            'name' => 'En un sartén adicional con mantequilla y a fuego bajo coloca la merluza a azar.',
            'step' => 3,
            'recipe_id' => 26,
        ]);
        Instruction::create([
            'name' => 'Simultáneamente enciende el sartén con la salsa y le incorporamos el queso crema, sal y pimienta y revuelve. Una vez esté la merluza sirve y baña con la salsa y espolvorea con perejil y sirve con una rica ensalada verde ',
            'step' => 4,
            'recipe_id' => 26,
        ]);
        Instruction::create([
            'name' => 'Preparación ensalada ',
            'step' => 5,
            'recipe_id' => 26,
        ]);
        Instruction::create([
            'name' => 'En la licuadora coloca el aguacate, cilantro, agua, aceite de oliva extra virgen, vinagre, sal y pimienta.  ',
            'step' => 6,
            'recipe_id' => 26,
        ]);
        Instruction::create([
            'name' => 'Cuando esté todo incorporado deja reposar.',
            'step' => 7,
            'recipe_id' => 26,
        ]);
        Instruction::create([
            'name' => 'En un tazón pon el resto de los ingredientes y baña los vegetales con la salsa que tienes en reposo.',
            'step' => 7,
            'recipe_id' => 26,
        ]);

        Instruction::create([
            'name' => 'En un sartén coloca el queso a fuego bajo.',
            'step' => 1,
            'recipe_id' => 27,
        ]);
        Instruction::create([
            'name' => 'Cuando esté burbujeando lo doblas con unas pinzas una de las puntas del queso y haces la forma de taco y deja que se endurezca.',
            'step' => 2,
            'recipe_id' => 27,
        ]);
        Instruction::create([
            'name' => 'Con anterioridad haces el huevo revuelto sin sal por que el parmesano es salado.',
            'step' => 3,
            'recipe_id' => 27,
        ]);
        Instruction::create([
            'name' => 'Rellena con el huevo.',
            'step' => 4,
            'recipe_id' => 27,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato.',
            'step' => 5,
            'recipe_id' => 27,
        ]);

        Instruction::create([
            'name' => 'En un sartén con mantequilla sofríe ajos sin que se doren mucho',
            'step' => 1,
            'recipe_id' => 29,
        ]);
        Instruction::create([
            'name' => 'Añade los espárragos y los salteas por unos 3 minutos máximo.',
            'step' => 2,
            'recipe_id' => 29,
        ]);
        Instruction::create([
            'name' => 'Añade el caldo y una pisca de sal y pimienta.  ',
            'step' => 3,
            'recipe_id' => 29,
        ]);
        Instruction::create([
            'name' => 'Deja que se hagan los espárragos.  Añade el chorizo y los huevos y los dejas cuajar.  ',
            'step' => 4,
            'recipe_id' => 29,
        ]);
        Instruction::create([
            'name' => 'Servimos de inmediato',
            'step' => 5,
            'recipe_id' => 29,
        ]);

        Instruction::create([
            'name' => 'Preparación hígado',
            'step' => 1,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'En un tazón machaca, la cebolla en plumas y el pimiento en juliana. Reserva',
            'step' => 2,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Calienta la manteca en una sartén, cuando ya esté bien caliente, fríe el hígado, este atento y cuando este parcialmente cocido',
            'step' => 3,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Incorpora el resto de los ingredientes a la sartén y tapa.',
            'step' => 4,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Sigue cocinando durante 10 a 15 minutos (según tu gusto)',
            'step' => 5,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Pasado este tiempo, destapa la sartén y sigue cocinando por unos 5 minutos más.',
            'step' => 6,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Preparación puré de coliflor',
            'step' => 7,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Coloca a calentar en una olla agua',
            'step' => 8,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Cuando este bien caliente pon la coliflor entera solo la parte blanca, no más de 1 minuto.',
            'step' => 9,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Saca y seca super bien con un trapito pues suelta mucha agua.',
            'step' => 10,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Coloca en un bowl la coliflor, machaca con un tenedor y le agrega la mantequilla, el queso crema y 1 cucharada de queso parmesano, sal pimienta al gusto.',
            'step' => 11,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Revuelve todo super bien hasta quedar una pasta, pon en una refractaria y antes de llevar al horno espolvorea con el queso parmesano.',
            'step' => 12,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Lo dejas no más de 5 minutos o hasta que dore.',
            'step' => 13,
            'recipe_id' => 30,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato el hígado, acompañando con pure de coliflor y ensalada verde.',
            'step' => 14,
            'recipe_id' => 30,
        ]);

        Instruction::create([
            'name' => 'En un sartén coloca la mantequilla y so fríe la tocineta.',
            'step' => 1,
            'recipe_id' => 31,
        ]);
        Instruction::create([
            'name' => 'Cuando este crocante añade los trozos de queso y revuelve por unos segundos.',
            'step' => 2,
            'recipe_id' => 31,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta a tu gusto y retira de inmediato para que el queso no se derrita del todo.',
            'step' => 3,
            'recipe_id' => 31,
        ]);
        Instruction::create([
            'name' => 'Sirve y a comer de inmediato.',
            'step' => 4,
            'recipe_id' => 31,
        ]);

        Instruction::create([
            'name' => 'En un tazón coloca, las aceitunas, espinacas y el apio.  ',
            'step' => 1,
            'recipe_id' => 33,
        ]);
        Instruction::create([
            'name' => 'Añade la mayonesa y mezcla todo muy bien y espolvorea con sal y pimienta y nuevamente a mezclar.',
            'step' => 2,
            'recipe_id' => 33,
        ]);
        Instruction::create([
            'name' => 'A parte en un plato pando, coloca los trozos de salmón ',
            'step' => 3,
            'recipe_id' => 33,
        ]);
        Instruction::create([
            'name' => 'Encima vas rellenando con la pasta que has preparado en el tazón',
            'step' => 4,
            'recipe_id' => 33,
        ]);
        Instruction::create([
            'name' => 'Enrolla el salmón y séllalo con un palillo para evitar que se abran.',
            'step' => 5,
            'recipe_id' => 33,
        ]);
        Instruction::create([
            'name' => 'Antes de servir si deseas le puedes agregar más sal y pimienta y espolvorea con queso.',
            'step' => 6,
            'recipe_id' => 33,
        ]);

        Instruction::create([
            'name' => 'Coloca en un sartén un poco de aceite y sella las tiras de pollo.  ',
            'step' => 1,
            'recipe_id' => 34,
        ]);
        Instruction::create([
            'name' => 'Mientras en otro sartén o wok pones a fuego alto la mantequilla y deja que se caliente.',
            'step' => 2,
            'recipe_id' => 34,
        ]);
        Instruction::create([
            'name' => 'De esta forma cuando agregues las verduras quedaran crujientes. ',
            'step' => 3,
            'recipe_id' => 34,
        ]);
        Instruction::create([
            'name' => 'Agrega el calabacín, la cebolla, pepino y pimentón, y saltea durante 4 minutos.',
            'step' => 4,
            'recipe_id' => 34,
        ]);
        Instruction::create([
            'name' => 'Después agrega el pollo y revuelve para que el pollo termine de cocinar, antes de apagar añade el brócoli, especies y sal y pimienta al gusto. ',
            'step' => 5,
            'recipe_id' => 34,
        ]);
        Instruction::create([
            'name' => 'Deja unos minutos más antes de servir, espolvorea con queso y se añade al lado el aguacate',
            'step' => 6,
            'recipe_id' => 34,
        ]);

        Instruction::create([
            'name' => 'Coloca los huevos en agua caliente para cocerlos por 15 minutos.',
            'step' => 1,
            'recipe_id' => 35,
        ]);
        Instruction::create([
            'name' => 'Una vez listos los pelas y los partes por la mitad y separa las claras de las yemas, teniendo cuidado en no romper las claras. ',
            'step' => 2,
            'recipe_id' => 35,
        ]);
        Instruction::create([
            'name' => 'Para preparar el relleno, pones las yemas en un bowl con un poco de sal pimienta y lo machacas hasta hacer una pasta.',
            'step' => 3,
            'recipe_id' => 35,
        ]);
        Instruction::create([
            'name' => 'luego añade el jamón y las ramas de apio y vuelve a revolver hasta que todo quede totalmente incorporado, con ayuda de una cuchara pequeñita rellena los huevos y espolvorea con queso.',
            'step' => 4,
            'recipe_id' => 35,
        ]);

        Instruction::create([
            'name' => 'Precalentamos el horno a 180ºc',
            'step' => 1,
            'recipe_id' => 36,
        ]);
        Instruction::create([
            'name' => 'Ponemos a hervir el apio no más de 3 minutos en agua con sal y dejamos conservar',
            'step' => 2,
            'recipe_id' => 36,
        ]);
        Instruction::create([
            'name' => 'En un sartén caliente con la mantequilla agrega el apio, aceitunas y chicharrón, espolvorea con albahaca y orégano y deja por unos 2 minutos máximo',
            'step' => 3,
            'recipe_id' => 36,
        ]);
        Instruction::create([
            'name' => 'Después coloca todo en una refractaria, agrega los trocitos de queso y revuelve ',
            'step' => 4,
            'recipe_id' => 36,
        ]);
        Instruction::create([
            'name' => 'Antes de llevar al horno espolvorea con el queso y deja hasta que dore',
            'step' => 5,
            'recipe_id' => 36,
        ]);
        Instruction::create([
            'name' => 'Sirve caliente',
            'step' => 6,
            'recipe_id' => 36,
        ]);

        Instruction::create([
            'name' => 'En un vaso, mezcla todos los ingredientes de la salsa, revuelve muy bien y lo dejas en reserva.  ',
            'step' => 1,
            'recipe_id' => 37,
        ]);
        Instruction::create([
            'name' => 'En una olla con agua caliente y un poquito de sal (cuando el agua este hirviendo), añade el brócoli por 30 segundos, los retiras y lo pasas por agua fría.',
            'step' => 2,
            'recipe_id' => 37,
        ]);
        Instruction::create([
            'name' => ' A parte en un sartén hondo con mantequilla pon la cebolla a fuego bajo hasta que dore',
            'step' => 3,
            'recipe_id' => 37,
        ]);
        Instruction::create([
            'name' => 'Una vez dorada añade el lomo y vas removiendo hasta que esté totalmente cocido.  ',
            'step' => 4,
            'recipe_id' => 37,
        ]);
        Instruction::create([
            'name' => 'Cuando este el lomo bien cocido, sube el fuego, agrega el brócoli y la salsa',
            'step' => 6,
            'recipe_id' => 37,
        ]);
        Instruction::create([
            'name' => 'Revuelve por no más de 30 segundos, apaga y revuelve una vez más.',
            'step' => 6,
            'recipe_id' => 37,
        ]);
        Instruction::create([
            'name' => 'Sirve acompañado de aguacate',
            'step' => 7,
            'recipe_id' => 37,
        ]);

        Instruction::create([
            'name' => 'En un sartén, pon a calentar a fuego bajo la mantequilla y la tocineta por 3 minutos o hasta que este doradito',
            'step' => 1,
            'recipe_id' => 38,
        ]);
        Instruction::create([
            'name' => 'Agrega los champiñones, sal pimenta y revuelve',
            'step' => 2,
            'recipe_id' => 38,
        ]);
        Instruction::create([
            'name' => 'Deja por 8 minutos mas',
            'step' => 3,
            'recipe_id' => 38,
        ]);
        Instruction::create([
            'name' => 'Ya cocidos agrega el perejil y un chorrito de aceite de oliva revuelve por 30 segundos mas',
            'step' => 4,
            'recipe_id' => 38,
        ]);
        Instruction::create([
            'name' => 'Sirve en un plato los champiñones los espolvoreas con los trozos de huevo y sal pimenta al gusto',
            'step' => 5,
            'recipe_id' => 38,
        ]);

        Instruction::create([
            'name' => 'Precalentamos el horno a 180°',
            'step' => 1,
            'recipe_id' => 40,
        ]);
        Instruction::create([
            'name' => 'En un sartén a fuego alto pon la mantequilla y sofríes los espárragos y apaga',
            'step' => 2,
            'recipe_id' => 40,
        ]);
        Instruction::create([
            'name' => 'En una refractaria extiende las láminas de salmón y enrolla los espárragos     ',
            'step' => 3,
            'recipe_id' => 40,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta y agrega el aceite de oliva ',
            'step' => 4,
            'recipe_id' => 40,
        ]);
        Instruction::create([
            'name' => 'Espolvorea con queso parmesano y las especies y al horno',
            'step' => 5,
            'recipe_id' => 40,
        ]);
        Instruction::create([
            'name' => 'Deja por 10 minutos o hasta que dore y sirve',
            'step' => 6,
            'recipe_id' => 40,
        ]);

        Instruction::create([
            'name' => 'En un sartén con mantequilla y a fuego bajo, coloca el ajo por un minuto',
            'step' => 1,
            'recipe_id' => 41,
        ]);
        Instruction::create([
            'name' => 'Agrega la cebolla, aceitunas, zuquini, apio, champiñones y sofríe por 2 minutos, agrega el pollo y mezcla ',
            'step' => 2,
            'recipe_id' => 41,
        ]);
        Instruction::create([
            'name' => 'Deja 1 minuto más apaga y baña con las cucharadas de aceite y tapa',
            'step' => 3,
            'recipe_id' => 41,
        ]);
        Instruction::create([
            'name' => 'En un plato ya para servir has una cama con la lechuga, agrega el pollo y encima agrega los trozos de aguacate, mayonesa y sal pimenta al gusto',
            'step' => 4,
            'recipe_id' => 41,
        ]);

        Instruction::create([
            'name' => 'En un sartén con mantequilla a fuego bajo parte los dos huevos y agrega sal',
            'step' => 1,
            'recipe_id' => 42,
        ]);
        Instruction::create([
            'name' => 'Deja que medio cocine y abierto, agrega las espinacas, queso y dobla',
            'step' => 2,
            'recipe_id' => 42,
        ]);
        Instruction::create([
            'name' => 'Deja que se siga cocinando hasta que se derrita el queso y apagas según tu gusto',
            'step' => 3,
            'recipe_id' => 42,
        ]);

        Instruction::create([
            'name' => 'Coloca las pieles de pollo abiertas en una bandeja que pueda estar en el horno',
            'step' => 1,
            'recipe_id' => 45,
        ]);
        Instruction::create([
            'name' => 'Rocía el ajo, las especies y sal pimenta',
            'step' => 2,
            'recipe_id' => 45,
        ]);
        Instruction::create([
            'name' => 'Hornea durante 15 minutos o hasta que queden crocantes, sirve acompañado de trocitos de queso',
            'step' => 3,
            'recipe_id' => 45,
        ]);

        Instruction::create([
            'name' => 'Precalentar el horno a 180°',
            'step' => 1,
            'recipe_id' => 46,
        ]);
        Instruction::create([
            'name' => 'En un sartén coloca los Nápoles para asarlos por no más de dos minutos por lado y lado.  Pero si utilizas el zuquini déjalo crudo ',
            'step' => 2,
            'recipe_id' => 46,
        ]);
        Instruction::create([
            'name' => 'En otro sartén con mantequilla a fuego alto sella el atún y deja reposar',
            'step' =>3,
            'recipe_id' => 46,
        ]);
        Instruction::create([
            'name' => 'En una refractaria con mantequilla esparcida, coloca los Nápoles o las rodajas de zuquini y encima agrega el atún sellado, le agregas la cebolla, tomate, chili, oréganos, dos cucharadas de mantequilla y sal pimienta',
            'step' => 4,
            'recipe_id' => 46,
        ]);
        Instruction::create([
            'name' => 'Hornea por 10 minutos o hasta que el atún este a su gusto',
            'step' => 5,
            'recipe_id' => 46,
        ]);
        Instruction::create([
            'name' => 'Pero antes de retirarlo agrega 2 cucharadas de aceite de oliva, espolvorea con el perejil y deja en el horno ya apagado por dos minutos más.',
            'step' => 6,
            'recipe_id' => 46,
        ]);

        Instruction::create([
            'name' => 'Precalienta el horno a 180°c ',
            'step' => 1,
            'recipe_id' => 47,
        ]);
        Instruction::create([
            'name' => 'En un bowl agrega los huevos, el queso bate y Salpimienta.',
            'step' => 2,
            'recipe_id' => 47,
        ]);
        Instruction::create([
            'name' => 'Coloca la mezcla en un tazón que pueda ir al horno',
            'step' => 3,
            'recipe_id' => 47,
        ]);
        Instruction::create([
            'name' => 'Deja por 8 minutos o hasta que quede esponjoso y dorado',
            'step' => 4,
            'recipe_id' => 47,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 5,
            'recipe_id' => 47,
        ]);

        Instruction::create([
            'name' => 'En un tazón, coloca los cuadritos de salmón, añade un chorro de vinagre, pimienta y déjalo macerar en la nevera 1 hora.',
            'step' => 1,
            'recipe_id' => 48,
        ]);
        Instruction::create([
            'name' => 'En otro tazón coloca el aguacate en trozos, añade la cebolla finamente picada, un chorrito de aceite de oliva, zumo de limón y sal pimienta y déjalo que se macere en la nevera, por media hora más.',
            'step' => 2,
            'recipe_id' => 48,
        ]);
        Instruction::create([
            'name' => 'Mientras que el salmón y aguacate se maceran, en un sartén con mantequilla y a fuego bajo sofrita el ajo y después que este dorado, se sube el fuego a su mayor expresión y agrega los espárragos y lo dejas al dente ',
            'step' => 3,
            'recipe_id' => 48,
        ]);
        Instruction::create([
            'name' => 'Finalmente mezcla todo (también se puede hacer en dos capas diferentes si es de su gusto)',
            'step' => 4,
            'recipe_id' => 48,
        ]);
        Instruction::create([
            'name' => 'Con un aro de emplastar, colocamos la mezcla, regamos con un chorrito de aceite y si nos gusta podemos añadir un poquito de cilantro picado y listo para servir.  Lo acompañamos con los espárragos, bañados en un poco de aceite de oliva',
            'step' => 5,
            'recipe_id' => 48,
        ]);

        Instruction::create([
            'name' => 'En un plato coloca las hojas de los cogollos abiertas, añade salpimienta, vinagre y un poco de aceite de oliva y deja reposar por unos minutos',
            'step' => 1,
            'recipe_id' => 49,
        ]);
        Instruction::create([
            'name' => 'Ya con el pollo en trozos coloca encima de las hojas el queso en rodajas, lo bañas con un poquito más en aceite de oliva y a comer',
            'step' => 2,
            'recipe_id' => 49,
        ]);

        Instruction::create([
            'name' => 'Prepara los huevos a tu gusto',
            'step' => 1,
            'recipe_id' => 51,
        ]);
        Instruction::create([
            'name' => '60 gramos de queso graso pueden ser manchego, cabra, parmesano, gruyer, cheddar, roquefort, edam, gouda, azul, camembert o al gusto, pero estos son los 10 más grasos en su orden',
            'step' => 2,
            'recipe_id' => 51,
        ]);
        Instruction::create([
            'name' => '1 pocillo de té verde o café o agua',
            'step' => 3,
            'recipe_id' => 51,
        ]);

        Instruction::create([
            'name' => 'Limpiamos muy bien las coles de brucelas, corta cada una por la mitad y las frotas con el limón para que no se pongan negras. ',
            'step' => 1,
            'recipe_id' => 52,
        ]);
        Instruction::create([
            'name' => 'Cocemos al vapor con un fondo de agua y unas gotas de limón hasta que queden al dente.',
            'step' => 2,
            'recipe_id' => 52,
        ]);
        Instruction::create([
            'name' => 'Mientras tanto en una cacerola con mantequilla y a fuego bajo-medio sofríe la cebolla, el ajo, la hoja de laurel y la tocineta.  ',
            'step' => 3,
            'recipe_id' => 52,
        ]);
        Instruction::create([
            'name' => 'Cuando empiece a dorar coloca los langostinos le das vuelta, deja unos minutos ',
            'step' => 4,
            'recipe_id' => 52,
        ]);
        Instruction::create([
            'name' => 'Cuando empiece a evaporar añade las coles (asegúrate que estén bien secas) y revuelve hasta que esté bien reducida la salsa. ',
            'step' => 5,
            'recipe_id' => 52,
        ]);
        Instruction::create([
            'name' => 'Al final añade el perejil y sirve.',
            'step' => 6,
            'recipe_id' => 52,
        ]);
        Instruction::create([
            'name' => 'Acompaña con un buen plato de verduras verdes a tú preferencia',
            'step' => 7,
            'recipe_id' => 52,
        ]);

        Instruction::create([
            'name' => 'Lava los champiñones y córtalos en rodajas finitas. ',
            'step' => 1,
            'recipe_id' => 53,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla y a fuego bajo sofríe el ajo y saltea los champiñones con un poco de pimienta.  ',
            'step' => 2,
            'recipe_id' => 53,
        ]);
        Instruction::create([
            'name' => 'A parte bate los huevos y sal pimienta si así lo deseas, agregamos el queso  ',
            'step' => 3,
            'recipe_id' => 53,
        ]);
        Instruction::create([
            'name' => 'En el mismo sartén que tienes los champiñones a fuego bajo añade el huevo y espera que empiecen a cuajar, voltea por lado y lado para que se funda el queso. ',
            'step' => 4,
            'recipe_id' => 53,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 5,
            'recipe_id' => 53,
        ]);

        Instruction::create([
            'name' => 'Precalentamos el horno a 180°c',
            'step' => 1,
            'recipe_id' => 55,
        ]);
        Instruction::create([
            'name' => 'Pon a cocinar los huevos por 12 a 15 minutos, cuando estén duros, deja enfriar y después se los pelas.  ',
            'step' => 2,
            'recipe_id' => 55,
        ]);
        Instruction::create([
            'name' => 'En una taza tritura los huevos con un cubierto y agrega la cebolla, la tocineta, mayonesa y revuelve',
            'step' => 3,
            'recipe_id' => 55,
        ]);
        Instruction::create([
            'name' => 'Agrega adicional el aceite de oliva, sal pimienta y sigue revolviendo hasta que se incorpore y quede como una masa y deja conservar',
            'step' => 4,
            'recipe_id' => 55,
        ]);
        Instruction::create([
            'name' => 'A parte limpia el portobello, con una cuchara pequeña y quita el centro para dejar bien limpio y hueco. ',
            'step' => 5,
            'recipe_id' => 55,
        ]);
        Instruction::create([
            'name' => 'Una vez este hueco, rellena con la masa de huevo anteriormente ya lista',
            'step' => 6,
            'recipe_id' => 55,
        ]);
        Instruction::create([
            'name' => 'Coloca el portobello en una refractaria, espolvorea con el queso parmesano',
            'step' => 7,
            'recipe_id' => 55,
        ]);
        Instruction::create([
            'name' => 'Deja hornear por 15 minutos máximo o hasta que dore',
            'step' => 8,
            'recipe_id' => 55,
        ]);

        Instruction::create([
            'name' => 'Cuando compres el solomillo pide que lo limpien y que lo corten en medallones de un dedo de grosor',
            'step' => 1,
            'recipe_id' => 56,
        ]);
        Instruction::create([
            'name' => 'Con anterioridad unta cada medallón con aceite de oliva, salpimienta y deja por media hora mínimo, conservando',
            'step' => 2,
            'recipe_id' => 56,
        ]);
        Instruction::create([
            'name' => 'Después en un sartén precalentado a fuego bajo y con mantequilla coloca los medallones para asar por lado y lado a su gusto',
            'step' => 3,
            'recipe_id' => 56,
        ]);
        Instruction::create([
            'name' => 'Una vez listo sirve con la ensalada',
            'step' => 4,
            'recipe_id' => 56,
        ]);
        Instruction::create([
            'name' => 'Cuando esté todo incorporado, baña los vegetales del tazón.',
            'step' => 5,
            'recipe_id' => 56,
        ]);

        Instruction::create([
            'name' => 'Coloca las cucharadas de queso en un sartén a fuego bajo',
            'step' => 1,
            'recipe_id' => 57,
        ]);
        Instruction::create([
            'name' => 'Con anterioridad ya has realizado el huevo revuelto',
            'step' => 2,
            'recipe_id' => 57,
        ]);
        Instruction::create([
            'name' => 'Cuando el queso esté burbujeando agrega el huevo y cierra el queso en forma de empanada',
            'step' => 3,
            'recipe_id' => 57,
        ]);

        Instruction::create([
            'name' => 'Parte en dos los huevos cocidos y deja en un plato',
            'step' => 1,
            'recipe_id' => 59,
        ]);
        Instruction::create([
            'name' => 'En una taza para hacer la salsa mezcla el ajo, el perejil, orégano, vinagre, las gotas de tabasco, sal pimienta y revuelve muy bien para que se incorpore.',
            'step' => 2,
            'recipe_id' => 59,
        ]);
        Instruction::create([
            'name' => 'Sirve los huevos acompañados del aguacate y baña en la salsa',
            'step' => 3,
            'recipe_id' => 59,
        ]);


        Instruction::create([
            'name' => 'En un sartén a fuego bajo y con mantequilla o manteca sofrita el ajo hasta que dore ',
            'step' => 1,
            'recipe_id' => 60,
        ]);
        Instruction::create([
            'name' => 'Añadir las verduras y dejar cocinar de 5 a 7 minutos o hasta que las verduras estén al dente.  ',
            'step' => 2,
            'recipe_id' => 60,
        ]);
        Instruction::create([
            'name' => 'Salpimentar al gusto y dejar reposar.',
            'step' => 3,
            'recipe_id' => 60,
        ]);
        Instruction::create([
            'name' => 'En otro sartén hacer a la plancha el salmón y dejar cocinar de acuerdo a su preferencia.  ',
            'step' => 4,
            'recipe_id' => 60,
        ]);
        Instruction::create([
            'name' => 'Una vez todo listo servir el salmón junto con las verduras',
            'step' => 5,
            'recipe_id' => 60,
        ]);
        Instruction::create([
            'name' => 'Espolvorear pimienta al gusto.',
            'step' => 6,
            'recipe_id' => 60,
        ]);

        Instruction::create([
            'name' => 'Precalentar el horno a 180 °C',
            'step' => 1,
            'recipe_id' => 61,
        ]);
        Instruction::create([
            'name' => 'Bate muy bien los huevos y salpimienta.',
            'step' => 2,
            'recipe_id' => 61,
        ]);
        Instruction::create([
            'name' => 'En una bandeja que puedas llevar al horno redonda y pequeña, coloca el huevo y deja por 5 minutos que se haga la tortilla',
            'step' => 3,
            'recipe_id' => 61,
        ]);
        Instruction::create([
            'name' => 'Saca y agrega el queso y espolvorea con la especie y deja unos minutos más hasta que los bordes estén crocantes.',
            'step' => 4,
            'recipe_id' => 61,
        ]);

        Instruction::create([
            'name' => 'Partir el aguacate en trozos',
            'step' => 1,
            'recipe_id' => 62,
        ]);
        Instruction::create([
            'name' => 'En un plato colocar los trozos de aguacate y añadir las lonjas de salmón y poner las cucharadas de mayonesa',
            'step' => 2,
            'recipe_id' => 62,
        ]);
        Instruction::create([
            'name' => 'Sazonar al gusto con sal pimienta',
            'step' => 3,
            'recipe_id' => 62,
        ]);

        Instruction::create([
            'name' => 'Colocamos a cocer la carne en una olla a presión con suficiente agua',
            'step' => 1,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Añade el ajo y las hierbas.  ',
            'step' => 2,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla asa los jalapeños, la cebolla y el pimentón.  ',
            'step' => 3,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Una vez asados, la mitad de ellos la licuas con un chorrito de agua y agrega la hoja de laurel, un ajo y salpimienta al gusto.  ',
            'step' => 4,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Cuando esté listo incorpora esta salsa en el sartén donde tenemos asados la mitad de los otros jalapeños, la cebolla y el pimentón',
            'step' => 5,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Enciende a fuego bajo y agrega una taza de caldo, donde se cocinó la carne. ',
            'step' => 6,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Después incorpora la carne, que, para este momento, ya debe estar lista y desmechada ',
            'step' => 7,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Revuelve y deja por unos 5 minutos más, para que todo se mezcle.   ',
            'step' => 8,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Sirve con el puré de coliflor',
            'step' => 9,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Coloca a calentar agua en una olla y cuando esté hirviendo coloca la coliflor por 5 minutos o hasta que ablande',
            'step' => 10,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Retira y coloca en un paño para secar muy bien porque suelta mucha agua',
            'step' => 11,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Una vez bien seco, pon en un bowl y machaca con un tenedor hasta formar una pasta',
            'step' => 12,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'A continuación, agrega la mantequilla, el queso crema y sigue revolviendo para terminar de incorporar todo',
            'step' => 13,
            'recipe_id' => 63,
        ]);
        Instruction::create([
            'name' => 'Coloca en una refractaria, espolvorea con el parmesano y al horno por 10 minutos o hasta que dore',
            'step' => 14,
            'recipe_id' => 63,
        ]);

        Instruction::create([
            'name' => 'Si deseas que los huevitos queden revoltosos, tienes que batir los huevos en una taza antes, hasta que aparezcan burbujas ',
            'step' => 1,
            'recipe_id' => 64,
        ]);
        Instruction::create([
            'name' => 'Una vez los tengas listos, añade la crema de leche y vuelve a batir. ',
            'step' => 2,
            'recipe_id' => 64,
        ]);
        Instruction::create([
            'name' => 'Ya con el sartén a fuego bajo y con la mantequilla derrite, agrega el huevo y lo mueves suavemente, cuando la textura este cremosa y no suelte demasiado líquido, añade la sal.',
            'step' => 3,
            'recipe_id' => 64,
        ]);
        Instruction::create([
            'name' => 'Remueve nuevamente, apaga y tapa para que se termine de cocinar.  Sirve caliente con una porción de queso.',
            'step' => 4,
            'recipe_id' => 64,
        ]);

        Instruction::create([
            'name' => 'Horno a 180°C',
            'step' => 1,
            'recipe_id' => 65,
        ]);
        Instruction::create([
            'name' => 'Corta el queso en 4 tiras, cada una similar al tamaño de un dedo ',
            'step' => 2,
            'recipe_id' => 65,
        ]);
        Instruction::create([
            'name' => 'Deja los quesos por más de 1 hora en el congelador antes de apanar ',
            'step' => 3,
            'recipe_id' => 65,
        ]);
        Instruction::create([
            'name' => 'En un bol mezcla el queso parmesano con las especies ',
            'step' => 4,
            'recipe_id' => 65,
        ]);
        Instruction::create([
            'name' => 'En otro bowl coloca el huevo batido',
            'step' => 5,
            'recipe_id' => 65,
        ]);
        Instruction::create([
            'name' => 'Pasa cada dedo en el huevo y después por el queso parmesano, repite para que se cubra muy bien  ',
            'step' => 6,
            'recipe_id' => 65,
        ]);
        Instruction::create([
            'name' => 'En una refractaria coloca los dedos y de una al horno durante 15 minutos, o hasta que dore',
            'step' => 7,
            'recipe_id' => 65,
        ]);

        Instruction::create([
            'name' => 'Licua la cebolla, el cilantro, la crema y el caldo de pollo.  ',
            'step' => 1,
            'recipe_id' => 66,
        ]);
        Instruction::create([
            'name' => 'Derrite la mantequilla en un sartén a fuego bajo y agrega la salsa de cilantro y deja sofreír por unos cuantos minutos no más de 5 minutos',
            'step' => 2,
            'recipe_id' => 66,
        ]);
        Instruction::create([
            'name' => 'Mientras, en un sartén coloca a azar los perniles que estén bien cocidos y dorados por lado y lado.  ',
            'step' => 3,
            'recipe_id' => 66,
        ]);
        Instruction::create([
            'name' => 'Sirve los perniles, báñalos con la salsa de cilantro y adiciona la ensalada',
            'step' => 4,
            'recipe_id' => 66,
        ]);
        Instruction::create([
            'name' => 'En una licuadora se colocan 3 cucharadas de aceite de oliva extra virgen, 1 cucharada de perejil, 2 cucharadas de vinagre, sal y pimienta, cuando esté todo incorporado baña los vegetales del tazón (es una alternativa puedes elegir al gusto)',
            'step' => 5,
            'recipe_id' => 66,
        ]);

        Instruction::create([
            'name' => 'En un sartén coloca la tocineta y deja que se sofríe, esta va sin aceite pues con su mismo aceite se van haciendo',
            'step' => 1,
            'recipe_id' => 67,
        ]);
        Instruction::create([
            'name' => 'En una olla con agua y cuando este hirviendo coloca los huevos y déjalos, pero no dejes que se cuaje la yema, ya que es importante cuando rompamos los huevos.',
            'step' => 2,
            'recipe_id' => 67,
        ]);
        Instruction::create([
            'name' => 'Cuando estén, la tocineta y los huevos, coloca la tocineta en un plato',
            'step' => 3,
            'recipe_id' => 67,
        ]);
        Instruction::create([
            'name' => 'Salpimienta, rompe los huevos, mezcla y sirve',
            'step' => 4,
            'recipe_id' => 67,
        ]);

        Instruction::create([
            'name' => 'Une con cuerda de cocina el cilantro y el cebollín.',
            'step' => 1,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'En una olla con agua, pon los ajos enteros y la unión anterior y la costilla',
            'step' => 2,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'Deja cocinar hasta que la carne este suave ',
            'step' => 3,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'Retira el ajo y las ramas de cebolla y cilantro',
            'step' => 4,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'Explota el huevo para colocar a cocinar en el caldo por 15 minutos ',
            'step' => 5,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'Si desea que el huevo salga completo no revuelva',
            'step' => 6,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'Agrega la cebolla y el cilantro picado que tenías pendiente',
            'step' => 7,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'Deja 3 minutos y tapa.',
            'step' => 8,
            'recipe_id' => 68,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato, pero ojo solo puedes comer una porción de costilla no más de 80 gramos, más el huevo, el resto es para el gusto y para el resto de familia',
            'step' => 9,
            'recipe_id' => 68,
        ]);

        Instruction::create([
            'name' => 'Precalentar el horno a 180oC',
            'step' => 1,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'Quita la parte verde de la coliflor, la blanca la debes rallar en un tazón como si fuera queso.  ',
            'step' => 2,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'Una vez rallado, colócala a cocinar en agua super hirviendo o métela en el horno microondas para que ablande ',
            'step' => 3,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'Ya blanda retírala y colócala en un trapito limpio para secarla muy bien, ojo muy bien, porque suelta mucha agua',
            'step' => 4,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'En un bowl pon la coliflor y agrega mantequilla, huevo y el queso.',
            'step' => 5,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'Mezcla todo hasta que quede una masa consistente y bien integrada.',
            'step' => 6,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'En la bandeja del horno previamente con mantequilla o papel para hornear, la pones y empieza a darle forma redonda y plana a la masa como la de una pizza',
            'step' => 7,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'La pizza llévala al horno ya precalentado por 20 minutos y cuando esté dorada la retiras',
            'step' => 8,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'Agrega los ingredientes que deseen y espolvorea con queso parmesano o cualquier tipo de queso y nuevamente llévala al horno por no más de 5 minutos para que se gratine, sirve',
            'step' => 9,
            'recipe_id' => 69,
        ]);
        Instruction::create([
            'name' => 'Ojo debes servir con aguacate o una pequeña ensalada de tu gusto, teniendo en cuenta las cantidades que utilizaste de verduras en la pizza',
            'step' => 10,
            'recipe_id' => 69,
        ]);
        
        Instruction::create([
            'name' => 'Precalienta el horno a 200 °c (400 °F)',
            'step' => 1,
            'recipe_id' => 70,
        ]);
        Instruction::create([
            'name' => 'En un sartén sofríe el tocino hasta que esté bien crocante. Guarda la grasa ',
            'step' => 2,
            'recipe_id' => 70,
        ]);
        Instruction::create([
            'name' => 'Con la grasa que soltó el tocino sofríe, el apio, cebolla, si está muy seco agrega mantequilla ',
            'step' => 3,
            'recipe_id' => 70,
        ]);
        Instruction::create([
            'name' => 'Pon los champiñones al revés (ya limpios con una cuchara que solo quede la cubierta), en un sartén para que soplen, solo unos segundos y que este sartén tenga un poco de mantequilla',
            'step' => 4,
            'recipe_id' => 70,
        ]);
        Instruction::create([
            'name' => 'En un bowl, mezcla el tocino, apio, cebolla, la mayonesa y rellena el o los portobellos.',
            'step' => 5,
            'recipe_id' => 70,
        ]);
        Instruction::create([
            'name' => 'Espolvorea con queso parmesano y especies antes de ir al horno',
            'step' => 6,
            'recipe_id' => 70,
        ]);
        Instruction::create([
            'name' => 'Hornea por unos 15 minutos o hasta que los champiñones se doren.',
            'step' => 7,
            'recipe_id' => 70,
        ]);

        Instruction::create([
            'name' => 'Para preparar las albóndigas, en un tazón coloca la carne molida, el huevo, la cebolla perejil, tocineta sal y pimienta',
            'step' => 1,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Agrega un chorrito de aceite de oliva y mezcla todo bien hasta que se incorpore',
            'step' => 2,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Una vez esté la carne consistente, coge pequeñas porciones y haces bolitas como si fueran de pin pon. ',
            'step' => 3,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Deja reposar ',
            'step' => 4,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'A parte coloca en una olla con media taza de agua y un poquito de sal la coliflor para que ablande ',
            'step' => 5,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Una vez esté bien blando la sacas y en otro tazón machaca con un tenedor',
            'step' => 6,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Cuando este bien desintegrada agrega la mantequilla, el queso mozzarella, la crema de leche',
            'step' => 7,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Incorpora hasta que quede una masa y la deja en una refractaria',
            'step' => 8,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Antes de llevar al horno se espolvorea con el queso parmesano',
            'step' => 9,
            'recipe_id' => 71,
        ]);
        Instruction::create([
            'name' => 'Mientras que está la coliflor, vas so fritando las albóndigas y una vez listas las sirven con la porción de coliflor gratinado',
            'step' => 10,
            'recipe_id' => 71,
        ]);

        Instruction::create([
            'name' => 'Ensalada fría al gusto, pero que los vegetales no superen 9 gramos de carbohidratos',
            'step' => 11,
            'recipe_id' => 71,
        ]);

        Instruction::create([
            'name' => 'En un sartén a fuego bajo y con 2 cucharadas de mantequilla sofríe el ajo',
            'step' => 1,
            'recipe_id' => 72,
        ]);
        Instruction::create([
            'name' => 'Si encuentras las lonjas de tocino romero las sofríes antes de envolver los espárragos.',
            'step' => 2,
            'recipe_id' => 72,
        ]);
        Instruction::create([
            'name' => 'Después envuelve y coloca en el sartén donde tenemos el ajo con un poco más de mantequilla',
            'step' => 3,
            'recipe_id' => 72,
        ]);
        Instruction::create([
            'name' => 'Y deja hasta que los espárragos se sofrían',
            'step' => 4,
            'recipe_id' => 72,
        ]);
        Instruction::create([
            'name' => 'Antes de servir espolvorea con el queso',
            'step' => 5,
            'recipe_id' => 72,
        ]);
        Instruction::create([
            'name' => 'Si el tocino es por trozos, los sofríes a parte en un sartén',
            'step' => 6,
            'recipe_id' => 72,
        ]);
        Instruction::create([
            'name' => 'Y simultáneamente en el sartén que tienes el ajo, pon los espárragos y sofríelos',
            'step' => 7,
            'recipe_id' => 72,
        ]);
        Instruction::create([
            'name' => 'Una vez listas las dos cosas, sirve los espárragos, le agregas por encima el tocino y espolvorea con queso',
            'step' => 8,
            'recipe_id' => 72,
        ]);

        Instruction::create([
            'name' => 'En un sartén con mantequilla coloca a fuego lento, agrega la cebolla y el ajo',
            'step' => 1,
            'recipe_id' => 73,
        ]);
        Instruction::create([
            'name' => 'Deja cocinar por unos minutos, no más de tres y agrega los camarones, removiendo lentamente, apaga y deja tapado.',
            'step' => 2,
            'recipe_id' => 73,
        ]);
        Instruction::create([
            'name' => 'En un sartén adicional con mantequilla coloca el salmón azar y deja a fuego muy bajito.  ',
            'step' => 3,
            'recipe_id' => 73,
        ]);
        Instruction::create([
            'name' => 'Nuevamente prende el sartén de la salsa e incorpora el queso crema, sal, pimienta y revuelve.  ',
            'step' => 4,
            'recipe_id' => 73,
        ]);
        Instruction::create([
            'name' => 'Una vez este el salmón sirve y baña con la salsa, espolvorea con perejil ',
            'step' => 5,
            'recipe_id' => 73,
        ]);
        Instruction::create([
            'name' => 'Se acompaña con ensalada ',
            'step' => 6,
            'recipe_id' => 73,
        ]);
        Instruction::create([
            'name' => 'En una licuadora coloca 3 cucharadas de aceite de oliva extra virgen, 1 cucharada de perejil, 2 cucharadas de vinagre de sidra de manzana, sal y pimienta, cuando esté todo incorporado finalmente baña los vegetales del tazón.',
            'step' => 7,
            'recipe_id' => 73,
        ]);

        Instruction::create([
            'name' => 'Parte los huevos ',
            'step' => 1,
            'recipe_id' => 74,
        ]);
        Instruction::create([
            'name' => 'Espolvorea el queso parmesano',
            'step' => 2,
            'recipe_id' => 74,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta y baña con el aceite de oliva',
            'step' => 3,
            'recipe_id' => 74,
        ]);

        Instruction::create([
            'name' => 'En una copa con el agua, añadimos todos los ingredientes.',
            'step' => 1,
            'recipe_id' => 75,
        ]);
        Instruction::create([
            'name' => 'Revolvemos muy bien y de una lo tomamos.',
            'step' => 2,
            'recipe_id' => 75,
        ]);

        Instruction::create([
            'name' => 'En una jarra poner el agua y el hielo o en licuadora y hacer tu bebida frappe.',
            'step' => 1,
            'recipe_id' => 76,
        ]);
        Instruction::create([
            'name' => 'Agregar el limón y revolver.',
            'step' => 2,
            'recipe_id' => 76,
        ]);
        Instruction::create([
            'name' => 'Seguido la sal, hojas de hierbabuena y revolver una vez más.',
            'step' => 3,
            'recipe_id' => 76,
        ]);
        Instruction::create([
            'name' => 'Listo para disfrutar durante el día.',
            'step' => 4,
            'recipe_id' => 76,
        ]);

        Instruction::create([
            'name' => 'En una jarra poner el agua y el hielo o en licuadora y hacer tu bebida frappe. ',
            'step' => 1,
            'recipe_id' => 77,
        ]);
        Instruction::create([
            'name' => 'Agregar el limón y revolver.',
            'step' => 2,
            'recipe_id' => 77,
        ]);
        Instruction::create([
            'name' => 'Seguido la sal, láminas de pepino y revolver una vez más.',
            'step' => 3,
            'recipe_id' => 77,
        ]);
        Instruction::create([
            'name' => 'Listo para disfrutar durante el día.',
            'step' => 4,
            'recipe_id' => 77,
        ]);

        Instruction::create([
            'name' => 'En una jarra poner el agua y el hielo o en licuadora y hacer tu bebida frappe.',
            'step' => 1,
            'recipe_id' => 78,
        ]);
        Instruction::create([
            'name' => 'Agregar el limón y revolver.',
            'step' => 2,
            'recipe_id' => 78,
        ]);
        Instruction::create([
            'name' => 'Seguido la sal, vinagre y revolver una vez más.',
            'step' => 3,
            'recipe_id' => 78,
        ]);
        Instruction::create([
            'name' => 'Listo para disfrutar durante el día.',
            'step' => 4,
            'recipe_id' => 78,
        ]);

        Instruction::create([
            'name' => 'En una jarra poner el agua y el hielo o en licuadora y hacer tu bebida frappe.',
            'step' => 1,
            'recipe_id' => 79,
        ]);
        Instruction::create([
            'name' => 'Agregar el limón y revolver.',
            'step' => 2,
            'recipe_id' => 79,
        ]);
        Instruction::create([
            'name' => 'Seguido la sal, trozos de apio y revolver una vez más.',
            'step' => 3,
            'recipe_id' => 79,
        ]);
        Instruction::create([
            'name' => 'Listo para disfrutar durante el día.',
            'step' => 4,
            'recipe_id' => 79,
        ]);
        
        Instruction::create([
            'name' => '1.En una olla pequeña se pone el agua a calentar.',
            'step' => 1,
            'recipe_id' => 80,
        ]);
        Instruction::create([
            'name' => 'Cuando esté a punto de hervir le añades la manzanilla. ',
            'step' => 2,
            'recipe_id' => 80,
        ]);
        Instruction::create([
            'name' => 'Se deja que hierva, se apaga y se tapa por unos minutos.',
            'step' => 3,
            'recipe_id' => 80,
        ]);
        Instruction::create([
            'name' => 'Para que se concentre, si es de tu gusto antes de servir le puedes agregar las gotas de limón.',
            'step' => 4,
            'recipe_id' => 80,
        ]);
        Instruction::create([
            'name' => 'Listo y a disfrutar, esta hierba es maravillosa para conciliar el sueño.',
            'step' => 5,
            'recipe_id' => 80,
        ]);    

        Instruction::create([
            'name' => '1.En una olla pequeña se pone el agua a calentar.',
            'step' => 1,
            'recipe_id' => 81,
        ]);
        Instruction::create([
            'name' => 'Cuando esté a punto de hervir le añades el cidrón.',
            'step' => 2,
            'recipe_id' => 81,
        ]);
        Instruction::create([
            'name' => 'Se deja que hierva, se apaga y se tapa por unos minutos.',
            'step' => 3,
            'recipe_id' => 81,
        ]);
        Instruction::create([
            'name' => 'Para que se concentre, si es de tu gusto antes de servir le puedes agregar las gotas de limón.',
            'step' => 4,
            'recipe_id' => 81,
        ]);
        Instruction::create([
            'name' => 'Listo y a disfrutar, esta hierba es maravillosa para conciliar el sueño.',
            'step' => 5,
            'recipe_id' => 81,
        ]);

        Instruction::create([
            'name' => '1.En una olla pequeña se pone el agua a calentar.',
            'step' => 1,
            'recipe_id' => 82,
        ]);
        Instruction::create([
            'name' => 'Cuando esté a punto de hervir le añades el toronjil.',
            'step' => 2,
            'recipe_id' => 82,
        ]);
        Instruction::create([
            'name' => 'Se deja que hierva, se apaga y se tapa por unos minutos.',
            'step' => 3,
            'recipe_id' => 82,
        ]);
        Instruction::create([
            'name' => 'Para que se concentre, si es de tu gusto antes de servir le puedes agregar las gotas de limón.',
            'step' => 4,
            'recipe_id' => 82,
        ]);
        Instruction::create([
            'name' => 'Listo y a disfrutar, esta hierba es maravillosa para conciliar el sueño.',
            'step' => 5,
            'recipe_id' => 82,
        ]);

        Instruction::create([
            'name' => 'En una olla pequeña se pone el agua a calentar.',
            'step' => 1,
            'recipe_id' => 83,
        ]);
        Instruction::create([
            'name' => 'Cuando esté a punto de hervir le añades la valeriana.',
            'step' => 2,
            'recipe_id' => 83,
        ]);
        Instruction::create([
            'name' => 'Se deja que hierva, se apaga y se tapa por unos minutos.',
            'step' => 3,
            'recipe_id' => 83,
        ]);
        Instruction::create([
            'name' => 'Para que se concentre.',
            'step' => 4,
            'recipe_id' => 83,
        ]);
        Instruction::create([
            'name' => 'Listo y a disfrutar, este te ayuda a relajarse y conciliar el sueño.',
            'step' => 5,
            'recipe_id' => 83,
        ]);

        Instruction::create([
            'name' => 'En una olla pequeña se pone el agua a calentar.',
            'step' => 1,
            'recipe_id' => 84,
        ]);
        Instruction::create([
            'name' => 'Cuando esté a punto de hervir le añades la tila.',
            'step' => 2,
            'recipe_id' => 84,
        ]);
        Instruction::create([
            'name' => 'Se deja que hierva, se apaga y se tapa por unos minutos.',
            'step' => 3,
            'recipe_id' => 84,
        ]);
        Instruction::create([
            'name' => 'Para que se concentre.',
            'step' => 4,
            'recipe_id' => 84,
        ]);
        Instruction::create([
            'name' => 'Listo y a disfrutar, este te ayuda a relajarse y conciliar el sueño.',
            'step' => 5,
            'recipe_id' => 84,
        ]);

        Instruction::create([
            'name' => 'En la licuadora ponemos el hielo, un poco de agua, pepino, limón y la sal',
            'step' => 1,
            'recipe_id' => 85,
        ]);
        Instruction::create([
            'name' => 'Revolvemos muy bien hasta que todo se incorpore.',
            'step' => 2,
            'recipe_id' => 85,
        ]);
        Instruction::create([
            'name' => 'Es importante que la consistencia quede bien grape por eso debe tener suficiente hielo.',
            'step' => 3,
            'recipe_id' => 85,
        ]);
        Instruction::create([
            'name' => 'Mientras que se va licuado, aparte poner sal normal y limón y escarchar la copa.',
            'step' => 4,
            'recipe_id' => 85,
        ]);
        Instruction::create([
            'name' => 'Una vez lista servir si desea poner encima ralladura de la cáscara de limón y una rodaja en la copa.',
            'step' => 5,
            'recipe_id' => 85,
        ]);

        Instruction::create([
            'name' => 'En el termo ponemos hielo, un poco de agua, vinagre, limón.',
            'step' => 1,
            'recipe_id' => 86,
        ]);
        Instruction::create([
            'name' => 'Tapamos y revolvemos muy bien hasta que todo se incorpore.',
            'step' => 2,
            'recipe_id' => 86,
        ]);
        Instruction::create([
            'name' => 'Una vez lista servir y le agregamos la porción de aceitunas.',
            'step' => 3,
            'recipe_id' => 86,
        ]);

        Instruction::create([
            'name' => 'En una batidora mezclar el huevo, sal, vinagre (o zumo de limón) y la mitad del aceite de oliva.',
            'step' => 1,
            'recipe_id' => 87,
        ]);
        Instruction::create([
            'name' => ' Una vez bien batido y cuando empiece a espesar añadimos la otra mitad del aceite.',
            'step' => 2,
            'recipe_id' => 87,
        ]);
        Instruction::create([
            'name' => 'Mezclamos hasta obtener el espesor deseado, antes de esto si deseas le puedes añadir las especies de tu gusto.',
            'step' => 3,
            'recipe_id' => 87,
        ]);
        Instruction::create([
            'name' => 'Si no consumes toda la mayonesa, puedes guardarla en un recipiente cerrado en el refrigerador, pero no más de dos días.',
            'step' => 4,
            'recipe_id' => 87,
        ]);
        Instruction::create([
            'name' => 'Recuerda que el huevo fácilmente se estropea.',
            'step' => 5,
            'recipe_id' => 87,
        ]);

        Instruction::create([
            'name' => 'En una batidora mezclar todos los ingredientes.',
            'step' => 1,
            'recipe_id' => 88,
        ]);
        Instruction::create([
            'name' => 'Dejar en la nevera conservando al menos dos horas.',
            'step' => 2,
            'recipe_id' => 88,
        ]);
        Instruction::create([
            'name' => 'Si no consumes toda la salsa, puedes guardarla en un recipiente cerrado en el refrigerador, pero no más de dos días.',
            'step' => 3,
            'recipe_id' => 88,
        ]);
        Instruction::create([
            'name' => 'Recuerda que tiene huevo y fácilmente se estropea.',
            'step' => 4,
            'recipe_id' => 88,
        ]);

        Instruction::create([
            'name' => 'En una licuadora o batidora poner todos los ingredientes y mezclar.',
            'step' => 1,
            'recipe_id' => 89,
        ]);
        Instruction::create([
            'name' => 'Si está muy seco añadir más aceite de oliva, recuerda que debe quedar espeso, pero no seco.',
            'step' => 2,
            'recipe_id' => 89,
        ]);
        Instruction::create([
            'name' => 'Dejar conservar en el refrigerador como mínimo dos horas.',
            'step' => 3,
            'recipe_id' => 89,
        ]);
        Instruction::create([
            'name' => 'Si no consumes toda la salsa, puedes guardarla en un recipiente cerrado en el refrigerador, pero no por muchos días.',
            'step' => 4,
            'recipe_id' => 89,
        ]);
        Instruction::create([
            'name' => 'Recuerda que son productos naturales y fácilmente se pueden estropear.',
            'step' => 5,
            'recipe_id' => 89,
        ]);

        Instruction::create([
            'name' => 'En una licuadora o batidora colocar el aguacate, ajo, limón, aceite, sal pimienta y chile si es de tu gusto.',
            'step' => 1,
            'recipe_id' => 90,
        ]);
        Instruction::create([
            'name' => 'Mezclamos todos los ingredientes hasta conseguir una crema suave. ',
            'step' => 2,
            'recipe_id' => 90,
        ]);
        Instruction::create([
            'name' => 'Poner la crema en un tazón y mezclar con el perejil.',
            'step' => 3,
            'recipe_id' => 90,
        ]);

        Instruction::create([
            'name' => 'En un recipiente de vidrio agregar el vinagre, jugo de limón, las hierbas y el ajo.',
            'step' => 1,
            'recipe_id' => 91,
        ]);
        Instruction::create([
            'name' => 'Y empezar a mezclar con un tenedor o mezclador manual.',
            'step' => 2,
            'recipe_id' => 91,
        ]);
        Instruction::create([
            'name' => 'Sin dejar de mezclar añadir el aceite pero que sea despacio y en forma de chorrito.',
            'step' => 3,
            'recipe_id' => 91,
        ]);
        Instruction::create([
            'name' => 'Y seguir batiendo, no dejar de hacerlo pues es muy importante que se una muy bien todo.',
            'step' => 4,
            'recipe_id' => 91,
        ]);
        Instruction::create([
            'name' => 'Antes de sellar el recipiente sal pimienta al gusto, agita muy bien.',
            'step' => 5,
            'recipe_id' => 91,
        ]);
        Instruction::create([
            'name' => ' Deja reposar durante 1 hora y a la nevera.',
            'step' => 6,
            'recipe_id' => 91,
        ]);
        Instruction::create([
            'name' => 'Para mayor concentración deja por lo menos 5 días antes de empezar a consumir.',
            'step' => 7,
            'recipe_id' => 91,
        ]);

        Instruction::create([
            'name' => 'En un sartén poner la mantequilla a fuego bajo.',
            'step' => 1,
            'recipe_id' => 92,
        ]);
        Instruction::create([
            'name' => 'Agregar la cebolla y cuando esté transparente ojo no sofrita añadir el queso azul.',
            'step' => 2,
            'recipe_id' => 92,
        ]);
        Instruction::create([
            'name' => 'Remover hasta que se derrita el queso.',
            'step' => 3,
            'recipe_id' => 92,
        ]);
        Instruction::create([
            'name' => 'Agregar la crema agria y dejar cocinar un poco más hasta que haga burbujitas.',
            'step' => 4,
            'recipe_id' => 92,
        ]);
        Instruction::create([
            'name' => 'Y revolver con un tenedor, hasta que tenga la consistencia que deseas.',
            'step' => 5,
            'recipe_id' => 92,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta.',
            'step' => 6,
            'recipe_id' => 92,
        ]);

        Instruction::create([
            'name' => 'En un tazón poner la crema agria, mayonesa y queso.',
            'step' => 1,
            'recipe_id' => 93,
        ]);
        Instruction::create([
            'name' => 'Mezclar todo muy bien con un tenedor agregar el limón y pimienta y seguir mezclando.',
            'step' => 2,
            'recipe_id' => 93,
        ]);
        Instruction::create([
            'name' => 'Una vez esté bien todo incorporado, dejar en la nevera al menos por 30 minutos antes de consumir.',
            'step' => 3,
            'recipe_id' => 93,
        ]);

        Instruction::create([
            'name' => 'Picar todo en trozos.',
            'step' => 1,
            'recipe_id' => 94,
        ]);
        Instruction::create([
            'name' => 'Poner todos los alimentos en un procesador o licuadora y mezclar. ',
            'step' => 2,
            'recipe_id' => 94,
        ]);
        Instruction::create([
            'name' => 'Debes asegurarte de que todo quede muy procesado, sin grumos, antes de servir puede espolvorear con especias.',
            'step' => 3,
            'recipe_id' => 94,
        ]);

        Instruction::create([
            'name' => 'Pelamos el aguacate y con un tenedor lo machacamos muy bien hasta quedar como puré.',
            'step' => 1,
            'recipe_id' => 95,
        ]);
        Instruction::create([
            'name' => 'Se le agrega la cebolla, el zumo de limón y seguimos mezclando.',
            'step' => 2,
            'recipe_id' => 95,
        ]);
        Instruction::create([
            'name' => 'Añadimos el tomate, aceite de oliva, cilantro, sal pimienta.',
            'step' => 3,
            'recipe_id' => 95,
        ]);
        Instruction::create([
            'name' => 'Mezclamos una vez más y llevamos a la nevera.',
            'step' => 4,
            'recipe_id' => 95,
        ]);


        Instruction::create([
            'name' => 'Precalentar el horno a 180°c',
            'step' => 1,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'En un tazón añade la harina, mantequilla, huevo, sal, queso crema y mezcla con batidora, hasta conseguir una masa consistente y sin grumos',
            'step' => 2,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'Engrasa con mantequilla una refractaria cuadrada para que salgan bien los triangulitos, pon la mezcla y lleva al horno',
            'step' => 3,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'Hornea por 10 minutos o hasta que cuando introduzcas un cuchillo salga limpio',
            'step' => 4,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'Déjalo enfriar para poder sacarlo y cortar por mitad en triángulo',
            'step' => 4,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'Preparación para mojar los triangulitos',
            'step' => 5,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'En un tazón mezcla el huevo',
            'step' => 6,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'En otro tazón pon el queso',
            'step' => 7,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'Después coge cada triangulito (ojo ya debe estar frio) pásalo por el huevo, deja que se empape muy bien',
            'step' => 8,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'Después pásalo por el queso, si es necesario repite para que queden bien empapados',
            'step' => 9,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'En un sartén con la mantequilla y a fuego bajo, pon cada triangulito a freír',
            'step' => 10,
            'recipe_id' => 96,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 11,
            'recipe_id' => 96,
        ]);

        Instruction::create([
            'name' => 'Precalentar el horno a 180oC',
            'step' => 1,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'En un sartén a fuego bajo con mantequilla dorar los trozos de pollo ',
            'step' => 2,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'Cuando esté medio hecho, añade la cebolla, pimentón                                           champiñones, ajo y sal pimienta, deja por 10 minutos o hasta que las verduras estén al dente retirar y reservar',
            'step' => 3,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'En otro sartén a fuego bajo, coloca el queso crema, azul, mozzarella y las especies al gusto y cuando se esté derretido añade el pollo, revuelve y apaga',
            'step' => 4,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'En una refractaria coloca el pollo y espolvorear con el queso parmesano',
            'step' => 5,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'Coloca en el horno por 10 minutos solo para gratinar',
            'step' => 6,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'Sirve con una buena ensalada',
            'step' => 7,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'Preparación ensalada',
            'step' => 8,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca todos los ingredientes menos el aguacate',
            'step' => 9,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta y revuelve muy bien',
            'step' => 10,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'Añade el vinagre y un buen chorro de aceite de oliva y nuevamente revuelve',
            'step' => 11,
            'recipe_id' => 97,
        ]);
        Instruction::create([
            'name' => 'Antes de servir añade el aguacate y vuelve a salpimentar',
            'step' => 12,
            'recipe_id' => 97,
        ]);

        Instruction::create([
            'name' => 'En un sartén con mantequilla y a fuego bajo coloca el ajo a sofreír',
            'step' => 1,
            'recipe_id' => 98,
        ]);
        Instruction::create([
            'name' => 'Una vez esté sofrito añade los champiñones y salpimienta',
            'step' => 2,
            'recipe_id' => 98,
        ]);
        Instruction::create([
            'name' => 'Cocina, por 2 a 3 minutos y agrega dos cucharadas de aceite de oliva y revuelve',
            'step' => 3,
            'recipe_id' => 98,
        ]);
        Instruction::create([
            'name' => 'Cocina por 1 minuto más',
            'step' => 4,
            'recipe_id' => 98,
        ]);
        Instruction::create([
            'name' => 'Apaga y agrega el perejil, las otras dos cucharadas de aceite y tapa por 1 o dos minutos más',
            'step' => 5,
            'recipe_id' => 98,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 6,
            'recipe_id' => 98,
        ]);


        Instruction::create([
            'name' => 'Bate los huevos en una taza hasta que aparezcan burbujas',
            'step' => 1,
            'recipe_id' => 99,
        ]);
        Instruction::create([
            'name' => 'Una vez listo agrega el queso crema y vuelve a batir ',
            'step' => 2,
            'recipe_id' => 99,
        ]);
        Instruction::create([
            'name' => 'En un sartén a fuego bajo y con la mantequilla derretida le agregamos el huevo y lo mueves suavemente, cuando la textura esté cremosa, añade la sal, remueve nuevamente',
            'step' => 3,
            'recipe_id' => 99,
        ]);
        Instruction::create([
            'name' => 'Apaga y tapa para que se termine de cocinar',
            'step' => 4,
            'recipe_id' => 99,
        ]);
        Instruction::create([
            'name' => 'Sirve caliente con la porción de queso y por fin tu café con leche',
            'step' => 5,
            'recipe_id' => 99,
        ]);
        

        Instruction::create([
            'name' => 'Preparación de la salsa',
            'step' => 1,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla y a fuego bajo se sofríe la cebolla y el ajo',
            'step' => 2,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'Cuando esté dorada, agrega la carne, revuelve y sal pimienta al gusto ',
            'step' => 3,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'Con la carne a medio hacer le agregas el tomate, orégano y especies de tú gusto y seguimos revolviendo',
            'step' => 4,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => ' Mientras que está la carne pon a hacer las pastas de zucchini en agua hirviendo y déjala, al dente o a tu gusto (otra opción es sofreír en mantequilla por unos minutos)',
            'step' => 5,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'Una vez las dos cosas, coloca en un plato hondo las pastas y encima la carne y espolvorea con el queso',
            'step' => 6,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'Sirve con una rica ensalada',
            'step' => 7,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca todos los ingredientes menos el perejil',
            'step' => 8,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta y revuelve muy bien',
            'step' => 9,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'Añade el balsámico, 3 cucharadas de aceite de oliva y revuelve',
            'step' => 10,
            'recipe_id' => 100,
        ]);
        Instruction::create([
            'name' => 'Antes de servir añade las otras dos cucharadas de aceite y el perejil y vuelve a salpimentar',
            'step' => 11,
            'recipe_id' => 100,
        ]);

        Instruction::create([
            'name' => 'En un tazón coloca las aceitunas, dos cucharadas de aceite de oliva y debes macerarlas hasta tener una pasta ',
            'step' => 1,
            'recipe_id' => 101,
        ]);
        Instruction::create([
            'name' => 'Con esta pasta adoba el salmón y sal pimienta, deja conservando 30 minutos mínimo',
            'step' => 2,
            'recipe_id' => 101,
        ]);
        Instruction::create([
            'name' => 'En otro tazón coloca las aceitunas verdes, la cebolla y mezcla con 4 cucharadas de aceite de oliva y conserva',
            'step' => 3,
            'recipe_id' => 101,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla y a fuego bajo pon el salmón a sofreír',
            'step' => 4,
            'recipe_id' => 101,
        ]);
        Instruction::create([
            'name' => 'Una vez esté sofrito al gusto, le agregamos el aderezo que tienes en el tazón con las aceitunas verdes',
            'step' => 5,
            'recipe_id' => 101,
        ]);
        Instruction::create([
            'name' => 'Cocina por 1 minuto, apaga y tapa para que se conserve el sabor por no más de 2 minutos',
            'step' => 6,
            'recipe_id' => 101,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 7,
            'recipe_id' => 101,
        ]);

        Instruction::create([
            'name' => 'En un sartén con 1 cucharada de mantequilla debes freír la tocineta hasta que dore',
            'step' => 1,
            'recipe_id' => 102,
        ]);
        Instruction::create([
            'name' => 'La retiras y déjala enfriar y conserva la grasita que está en el sartén',
            'step' => 2,
            'recipe_id' => 102,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca la grasa que quedó del sartén y mezcla con la otra cucharada de mantequilla, el queso crema, queso cheddar, sal pimienta y bate hasta que todo se incorpore. ',
            'step' => 3,
            'recipe_id' => 102,
        ]);
        Instruction::create([
            'name' => 'Esta mezcla, déjala en la nevera, por unos minutos',
            'step' => 4,
            'recipe_id' => 102,
        ]);
        Instruction::create([
            'name' => 'Después armar las bolitas y antes de servir espolvorea con la tocineta.',
            'step' => 5,
            'recipe_id' => 102,
        ]);
        
        Instruction::create([
            'name' => 'En un tazón coloca el limón, ajo, especias y las cucharadas de aceite',
            'step' => 1,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Mezcla todo muy bien',
            'step' => 2,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Con esta mezcla unta muy bien el pernil, sal pimienta y deja marinar por 20 minutos',
            'step' => 3,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Si deseas marinar de otra forma no hay problema',
            'step' => 4,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Después de este tiempo, en un sartén con mantequilla y a fuego bajo pon el pernil a la plancha',
            'step' => 5,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Deja que se hace por un lado y una vez doradito dale vuelta',
            'step' => 6,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Para cocinar por el otro lado, deja cocción según tu gusto',
            'step' => 7,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato con una rica ensalada de lentejas',
            'step' => 8,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Preparación para la ensalada',
            'step' => 9,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'En un tazón poner las lentejas y todas las verduras excepto la cucharada de las hojas de apio',
            'step' => 10,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Añadir el limón, aceite de oliva, salpimentar y revolver bien',
            'step' => 11,
            'recipe_id' => 103,
        ]);
        Instruction::create([
            'name' => 'Antes de servir espolvorear con las ramitas de apio y el queso parmesano',
            'step' => 12,
            'recipe_id' => 103,
        ]);

        Instruction::create([
            'name' => 'Ya cocidos los huevos y partidos a la mitad retira las yemas ',
            'step' => 1,
            'recipe_id' => 104,
        ]);
        Instruction::create([
            'name' => 'Reserva las claras a parte y la yema a parte',
            'step' => 2,
            'recipe_id' => 104,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca las yemas, le agregas la mayonesa, aceitunas salpimientas y mezclas todo muy bien, hasta que quede una pasta',
            'step' => 3,
            'recipe_id' => 104,
        ]);
        Instruction::create([
            'name' => 'Rellena otra vez las claras con la pasta, espolvorea con el queso ',
            'step' => 4,
            'recipe_id' => 104,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 5,
            'recipe_id' => 104,
        ]);

        Instruction::create([
            'name' => 'Preparación del Dip',
            'step' => 1,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'En una procesadora o licuadora pon todos los ingredientes, excepto los 10 gramos de tomate finamente picado',
            'step' => 2,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Bate muy bien, sal pimienta y vuelve a procesar',
            'step' => 3,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Coloca en una tacita y agrega por encima los tomaticos picado',
            'step' => 4,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Conservar en la nevera mientras se hacen las tortillas',
            'step' => 5,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Preparación tortillas',
            'step' => 6,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca el queso y el orégano y revuelve muy bien',
            'step' => 7,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'En un sartén pequeño redondo a fuego bajo, agrega dos cucharadas de la mezcla del queso y orégano',
            'step' => 8,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Que quede bien esparcido en forma de tortilla y tapar',
            'step' => 9,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Cuando esté burbujeando, debes voltear la tortilla un minuto más',
            'step' => 10,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Apaga y deja enfriar para que endurezca',
            'step' => 11,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Repites el mismo procedimiento para la otra tortilla',
            'step' => 12,
            'recipe_id' => 105,
        ]);
        Instruction::create([
            'name' => 'Una vez listas sirve con su dip para untar ',
            'step' => 13,
            'recipe_id' => 105,
        ]);


        Instruction::create([
            'name' => 'Preparación para el lomo y salsa ',
            'step' => 1,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'En una licuadora coloca la cebolla, cilantro, queso crema y el caldo de pollo',
            'step' => 2,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Licua muy bien hasta que todo quede compenetrado y deja conservar',
            'step' => 3,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'A parte en un sartén, coloca el lomo al azar, que esté bien cocido y dorado por lado y lado',
            'step' => 4,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Antes de terminar la cocción del lomo, en otro sartén a fuego bajo, derrite la mantequilla y agrega la salsa de cilantro que teníamos conservando',
            'step' => 5,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Deja sofreír por unos minutos',
            'step' => 6,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Una vez listo el lomo baña con la salsa de cilantro',
            'step' => 7,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato con tu rica ensalada',
            'step' => 8,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Preparación ensalada',
            'step' => 9,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'En un tazón pon todas las verduras sal pimienta y revuelve',
            'step' => 10,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Añade aceite de oliva y revuelve',
            'step' => 11,
            'recipe_id' => 106,
        ]);
        Instruction::create([
            'name' => 'Añade el vinagre, vuelve a salpimentar y revuelve una vez más antes de servir con el lomo',
            'step' => 12,
            'recipe_id' => 106,
        ]);

        Instruction::create([
            'name' => 'En un sartén a fuego bajo con mantequilla parte los dos huevos',
            'step' => 1,
            'recipe_id' => 107,
        ]);
        Instruction::create([
            'name' => 'De inmediato, espolvorea con sal y deja por 1 minuto',
            'step' => 2,
            'recipe_id' => 107,
        ]);
        Instruction::create([
            'name' => 'Seguido pon el queso y espolvorea con especies, tapa y apaga',
            'step' => 3,
            'recipe_id' => 107,
        ]);
        Instruction::create([
            'name' => 'Para que se cocine lentamente con el vapor, servimos de inmediato',
            'step' => 4,
            'recipe_id' => 107,
        ]);

        Instruction::create([
            'name' => 'Deja los espárragos por unos minutos en el aceite de oliva y sal pimienta',
            'step' => 1,
            'recipe_id' => 108,
        ]);
        Instruction::create([
            'name' => 'Después envuélvelos con la tocineta',
            'step' => 2,
            'recipe_id' => 108,
        ]);
        Instruction::create([
            'name' => 'En un sartén con 1 cucharada de mantequilla y a fuego alto, pon los espárragos y deja sofreír, ojo le debes dar vuelta para que no se quemen',
            'step' => 3,
            'recipe_id' => 108,
        ]);
        Instruction::create([
            'name' => 'Nuevamente sal pimienta y baja la llama al mínimo y tapa',
            'step' =>4,
            'recipe_id' => 108,
        ]);
        Instruction::create([
            'name' => 'Simultáneamente en otro sartén pon a freír un huevo',
            'step' => 5,
            'recipe_id' => 108,
        ]);
        Instruction::create([
            'name' => 'Una vez esté listo colócalo en el plato y encima los espárragos',
            'step' => 6,
            'recipe_id' => 108,
        ]);

        Instruction::create([
            'name' => 'Primero prepara el aderezo, coloca en una licuadora el aceite de oliva, vinagre, los 25 gramos de pimientos, perejil, orégano y crema agria',
            'step' => 1,
            'recipe_id' => 109,
        ]);
        Instruction::create([
            'name' => 'Licua muy bien, sal pimienta y vuelve a licuar, si está muy espesa, agrega otra cucharada de vinagre y aceite de oliva.  Deja conservando en la nevera',
            'step' => 2,
            'recipe_id' => 109,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca los ingredientes',
            'step' => 3,
            'recipe_id' => 109,
        ]);
        Instruction::create([
            'name' => 'Primero el arroz divídelo en porciones de lado y lado de manera que el fondo quede libre',
            'step' => 4,
            'recipe_id' => 109,
        ]);
        Instruction::create([
            'name' => 'Empieza a repartir hacía alrededor en un lado el aguacate, en el otro el pepino, hacia el otro lado la cebolla y hacia el centro los tomates Cherry',
            'step' => 5,
            'recipe_id' => 109,
        ]);
        Instruction::create([
            'name' => 'Una vez listo lo rocías con el zumo de limón y pimienta',
            'step' => 6,
            'recipe_id' => 109,
        ]);
        Instruction::create([
            'name' => 'Agrega la salsa si es de tu gusto, si no la puedes servir aparte',
            'step' => 7,
            'recipe_id' => 109,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 8,
            'recipe_id' => 109,
        ]);

        Instruction::create([
            'name' => 'En un tazón pon el queso parmesano',
            'step' => 1,
            'recipe_id' => 110,
        ]);
        Instruction::create([
            'name' => 'En otro tazón pon el huevo y bate',
            'step' => 2,
            'recipe_id' => 110,
        ]);
        Instruction::create([
            'name' => 'Moja cada trocito de pollo en el huevo y después pásalo por el queso',
            'step' => 3,
            'recipe_id' => 110,
        ]);
        Instruction::create([
            'name' => 'Repite para que el pollo quede bien sellado',
            'step' => 4,
            'recipe_id' => 110,
        ]);
        Instruction::create([
            'name' => 'En un sartén hondo a fuego bajo y con mantequilla coloca una buena cantidad para freír los Nuggets por lado y lado hasta que doren bien',
            'step' => 5,
            'recipe_id' => 110,
        ]);
        Instruction::create([
            'name' => 'Servir de inmediato',
            'step' => 6,
            'recipe_id' => 110,
        ]);

        Instruction::create([
            'name' => 'En un tazón pon las aceitunas, huevos, queso, manzana, sal pimienta, revuelve y deja conservando',
            'step' => 1,
            'recipe_id' => 111,
        ]);
        Instruction::create([
            'name' => 'En la licuadora o procesadora pon el vinagre, aceite y tomate',
            'step' => 2,
            'recipe_id' => 111,
        ]);
        Instruction::create([
            'name' => 'Revuelve bien hasta que todo se incorpore',
            'step' => 3,
            'recipe_id' => 111,
        ]);
        Instruction::create([
            'name' => 'Baña con esta salsa lo que tienes en el tazón y lo rocéalo nuevamente con pimienta',
            'step' => 4,
            'recipe_id' => 111,
        ]);

        Instruction::create([
            'name' => 'Preparación espaguetis ',
            'step' => 1,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'En un sartén con dos a tres cucharadas de mantequilla pon a sofreír el ajo y la cebolla por 2 minutos máximo',
            'step' => 2,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Agrega los espaguetis de zucchini y se sofríen, no más de dos minutos para que no se vuelvan cauchos, sal pimienta y deja tapado conservando ',
            'step' => 3,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'A parte mezcla en licuadora o procesadora, aguacate, limón, albahaca, aceite de oliva, un chorrito de agua y sal pimienta',
            'step' => 4,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Licua muy bien y si ves que sigue muy espesa agrega una copita de agua adicional  ',
            'step' => 5,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Nuevamente en el sartén en donde están los espaguetis agregas más mantequilla, los camarones, revuelve y de una agregas la sal',
            'step' => 6,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Revuelve hasta que todo se incorpore y se caliente, pero ojo hazlo con cuidado para evitar romper el zuquini',
            'step' => 7,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato en un plato hondo, adorna con los tomates Cherry y espolvorea con el queso ',
            'step' => 8,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Preparación coliflor',
            'step' => 9,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'En una olla con agua hirviendo coloca los arbolitos de coliflor por no más de 10 minutos',
            'step' => 10,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Retira de inmediato',
            'step' => 11,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Escurre, seca muy bien y reservamos ',
            'step' => 12,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Después en un sartén con mantequilla generosa, sofríe el ajo',
            'step' => 13,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Cuando esté doradito, coloca el coliflor y sal pimienta',
            'step' => 14,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Agrega si es necesario más mantequilla para que los arbolitos doren muy bien',
            'step' => 15,
            'recipe_id' => 112,
        ]);
        Instruction::create([
            'name' => 'Antes de servir báñalos con el aceite de oliva',
            'step' => 16,
            'recipe_id' => 112,
        ]);

        Instruction::create([
            'name' => 'En un tazón coloca el pollo, cebolla, tomate, crema y revuelve muy bien ',
            'step' => 1,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'Para que quede una especie de crema para untar, deja conservando',
            'step' => 2,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'En un sartén pequeño y a fuego bajo coloca 2 cucharadas de queso bien esparcidas y tapa',
            'step' => 3,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'Cuando el queso esté burbujeando voltea y vuelve a tapar',
            'step' => 4,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'Deja por 1 minuto más y retira para que se endurezca',
            'step' => 5,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'Haz lo mismo con el queso restante',
            'step' => 6,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'Una vez listas las dos tortillas',
            'step' => 7,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'Esparce media porción del pollo en cada una',
            'step' => 8,
            'recipe_id' => 113,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 9,
            'recipe_id' => 113,
        ]);

        Instruction::create([
            'name' => 'En un tazón bate los huevos y sal pimienta',
            'step' => 1,
            'recipe_id' => 114,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla y a fuego bajo coloca los huevos batidos',
            'step' => 2,
            'recipe_id' => 114,
        ]);
        Instruction::create([
            'name' => 'Espera unos 2 minutos cuando ya veas que estén cuajados',
            'step' => 3,
            'recipe_id' => 114,
        ]);
        Instruction::create([
            'name' => 'Seguido incorpora la cebolla, el tomate, espinacas, el pimentón, si así lo deseas y más sal    ',
            'step' => 4,
            'recipe_id' => 114,
        ]);
        Instruction::create([
            'name' => 'Deja calentar según tu preferencia blando o duro y antes de cerrar la omelet, agrega el queso espolvoreado. ',
            'step' => 5,
            'recipe_id' => 114,
        ]);
        Instruction::create([
            'name' => 'Antes de servir rociar un poco de aceite de oliva aromatizado',
            'step' => 6,
            'recipe_id' => 114,
        ]);

        Instruction::create([
            'name' => 'Preparación para los frijoles',
            'step' => 1,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'En la noche anterior deja los frijoles en remojo con agua, que los cubra',
            'step' => 2,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla sofreír la cebolla y el tomate y dejar unos segundos',
            'step' => 3,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Añade los frijoles con el agua, donde los pusiste en remojo, además añade el caldo de pollo cuando veas que los frijoles están un poco blandos',
            'step' => 4,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Agrega la panceta, pasta de tomate y la sal ',
            'step' => 5,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Tapa y deja cocinar hasta que ablande completamente',
            'step' => 6,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Revisa la sazón según tu preferencia ',
            'step' => 7,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Sirve en un plato hondo bien caliente y si deseas con unas gotas de ají o chile ',
            'step' => 8,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Preparación para la ensalada',
            'step' => 9,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Coloca en un plato, plano, distribuido el aguacate, pepino y las aceitunas',
            'step' => 10,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Sal pimienta',
            'step' => 11,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Rocía con el vinagre, el aceite y el limón',
            'step' => 12,
            'recipe_id' => 115,
        ]);
        Instruction::create([
            'name' => 'Espolvorea con el cilantro, si deseas, vuelves a salpimentar',
            'step' => 13,
            'recipe_id' => 115,
        ]);

        Instruction::create([
            'name' => 'En un sartén redondo y a fuego bajo, colocá las cucharadas de queso bien esparcidas y tapa',
            'step' => 1,
            'recipe_id' => 116,
        ]);
        Instruction::create([
            'name' => 'Cuando esté burbujeando coloca la pasta de tomate esparcida',
            'step' => 2,
            'recipe_id' => 116,
        ]);
        Instruction::create([
            'name' => 'Encima distribuye el huevo en rodajas, las aceitunas, el queso mozzarella',
            'step' => 3,
            'recipe_id' => 116,
        ]);
        Instruction::create([
            'name' => 'Espolvorea con el orégano y tapa',
            'step' => 4,
            'recipe_id' => 116,
        ]);
        Instruction::create([
            'name' => 'Cuando el queso mozzarella derrita apaga',
            'step' => 5,
            'recipe_id' => 116,
        ]);
        Instruction::create([
            'name' => 'Esperamos que se endurezca un poco',
            'step' => 6,
            'recipe_id' => 116,
        ]);
        Instruction::create([
            'name' => 'Antes de servir le rocía aceite de oliva y una pizca de orégano',
            'step' => 7,
            'recipe_id' => 116,
        ]);

        Instruction::create([
            'name' => 'Coloca en un tazón las espinacas, el pomelo, salmón y salpimienta',
            'step' => 1,
            'recipe_id' => 117,
        ]);
        Instruction::create([
            'name' => 'Baña con aceite de oliva y agrega la cucharada de vinagre',
            'step' => 2,
            'recipe_id' => 117,
        ]);
        Instruction::create([
            'name' => 'Si deseas puedes agregar más pimienta',
            'step' => 3,
            'recipe_id' => 117,
        ]);

        Instruction::create([
            'name' => 'Preparación de los medallones',
            'step' => 1,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Cuando compres la carne, puede ser solomillo pide, que lo limpien y que te la corten en medallones de un dedo de grosor',
            'step' => 2,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Después con una brocha esparce aceite de oliva, sal pimienta y envuelve, cada medallón con una lonja de tocino y deja conservando por media hora mínimo',
            'step' => 3,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Una vez listos, pon los medallones en una refractaria, previamente, untada con mantequilla y además le pones a cada medallón, encima, media cucharada de mantequilla ',
            'step' => 4,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Lleva al horno por 10 minutos o el tiempo de cocción según tu gusto',
            'step' => 5,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Una vez listo sirve con el filete de coliflor y tu porción de aguacate',
            'step' => 6,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Preparación para los filetes de coliflor',
            'step' => 7,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Precalentamos el horno a 220°C',
            'step' => 8,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'En una bandeja de horno pon los dos filetes de coliflor',
            'step' => 9,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Agrega con una brocha aceite de oliva, mantequilla y sal y pimienta al gusto.  Esto por lado y lado ',
            'step' => 10,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Lo pones al horno por 15 minutos o el tiempo que sea necesario para que doren, pero en la mitad del tiempo les das vuelta, para que doren por lado y lado',
            'step' => 11,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Mientras que se están haciendo los filetes que puede ser en el mismo momento de los medallones',
            'step' => 12,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Prepara la salsa con que vas a bañar los filetes',
            'step' => 13,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'En la licuadora o batidora pon el vinagre, limón, cebolla, ajo, sal pimienta y bate hasta que todo se incorpore',
            'step' => 14,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Después añade el aceite de oliva, perejil y orégano y bate nuevamente hasta tener la salsa',
            'step' => 15,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Si ves que está muy espesa le puedes agregar más aceite de oliva',
            'step' => 16,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Una vez listos los medallones y los filetes de coliflor',
            'step' => 17,
            'recipe_id' => 118,
        ]);
        Instruction::create([
            'name' => 'Sirve y baña la coliflor y el aguacate con la salsita anterior',
            'step' => 18,
            'recipe_id' => 118,
        ]);

        Instruction::create([
            'name' => 'Parte los huevos por la mitad, una vez estén duros',
            'step' => 1,
            'recipe_id' => 119,
        ]);
        Instruction::create([
            'name' => 'Retira la yema y deja aparte la clara',
            'step' => 2,
            'recipe_id' => 119,
        ]);
        Instruction::create([
            'name' => 'Mezcla la yema en una taza, la mayonesa, queso crema, la cebolla, el jamón y sal pimienta',
            'step' => 3,
            'recipe_id' => 119,
        ]);
        Instruction::create([
            'name' => 'Una vez todo mezclado vuelve a llenar cada tapida del huevo',
            'step' => 4,
            'recipe_id' => 119,
        ]);
        Instruction::create([
            'name' => ' Espolvorea con el queso',
            'step' => 5,
            'recipe_id' => 119,
        ]);
        Instruction::create([
            'name' => 'Y si deseas lo puedes poner al horno por 10 minutos a gratinar',
            'step' => 6,
            'recipe_id' => 119,
        ]);
        Instruction::create([
            'name' => 'Si no puedes servir de inmediato',
            'step' => 7,
            'recipe_id' => 119,
        ]);


        Instruction::create([
            'name' => 'Bate los 2 huevos en un tazón',
            'step' => 1,
            'recipe_id' => 120,
        ]);
        Instruction::create([
            'name' => 'Pon el queso parmesano y el orégano en otro tazón y revuelve, para que se incorpore muy bien',
            'step' => 2,
            'recipe_id' => 120,
        ]);
        Instruction::create([
            'name' => 'Una vez tengas los espárragos listos, introduce en el huevo, después pásalos por el queso parmesano y repetir el proceso para que cada esparrago quede bien cubierto de las dos cosas',
            'step' => 3,
            'recipe_id' => 120,
        ]);
        Instruction::create([
            'name' => 'Pon en un sartén a fuego medio alto, por dos minutos o hasta que veas que estén dorados',
            'step' => 4,
            'recipe_id' => 120,
        ]);
        Instruction::create([
            'name' => 'Simultáneamente revuelve el sobrante del huevo con el queso y pon a sofreír en tortilla',
            'step' => 5,
            'recipe_id' => 120,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 6,
            'recipe_id' => 120,
        ]);

        Instruction::create([
            'name' => 'Preparación para el salmón',
            'step' => 1,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Precalentar el horno a 180°C',
            'step' => 2,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla pon a tostar las almendras por unos segundos',
            'step' => 3,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Agrega el zumo de limón y deja por dos minutos hasta que el zumo se reduzca, deja conservando.',
            'step' => 4,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'En una refractaria previamente untada con mantequilla pon el salmón',
            'step' => 5,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Encima de cada lomo coloca media cucharadita de mantequilla, salpimienta y espolvorea con alguna especie',
            'step' => 6,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Pon al horno por no más de 10 minutos',
            'step' => 7,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Agrega la salsa de almendra que tenemos conservando, y espolvorea con el cebollín, el queso parmesano y dejar por 2 a 3 minutos más.',
            'step' => 8,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato sobre la cama de verduras, que ya deben estar. ',
            'step' => 9,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Preparación cama de verduras',
            'step' => 10,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'En un sartén con buena cantidad de mantequilla so frita el ajo',
            'step' => 11,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Una vez esté doradito, añade las verduras, más mantequilla y revuelve.',
            'step' => 12,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Cuando veas que estén al dente, sal pimienta, revuelve y tapa hasta tener el salmón listo',
            'step' => 13,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Sirve en un plato y encima el salmón',
            'step' => 14,
            'recipe_id' => 121,
        ]);
        Instruction::create([
            'name' => 'Acompaña con el aguacate',
            'step' => 15,
            'recipe_id' => 121,
        ]);

        Instruction::create([
            'name' => 'Precalentar horno a 180°C',
            'step' => 1,
            'recipe_id' => 122,
        ]);
        Instruction::create([
            'name' => 'En un tazón coloca la cebolla, el queso crema, mayonesa, tocinetas, la mitad de perejil y un chorrito de aceite de oliva, sal pimienta y revuelve hasta que se incorpore y quede como una masa',
            'step' => 2,
            'recipe_id' => 122,
        ]);
        Instruction::create([
            'name' => 'Rellena el portobello, báñalo con 2 cucharadas de aceite de oliva y le agregamos por encima el queso mozzarella',
            'step' => 3,
            'recipe_id' => 122,
        ]);
        Instruction::create([
            'name' => 'Pon en una refractaria y llévalo al horno por unos minutos.  Antes de servir espolvorea con perejil.',
            'step' => 4,
            'recipe_id' => 122,
        ]);

        Instruction::create([
            'name' => 'Para hacer los huevos, pon 1 litro de agua a hervir',
            'step' => 1,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Cuando ya esté burbujeando el agua, empieza a remover con una cuchara',
            'step' => 2,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Seguido parte los huevos y los agregas, ojo muy cerca al agua y despacio para que no se deshagan y en el remolino que hemos hecho con la cuchara',
            'step' => 3,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Déjalo por 3 minutos para que la yema quede líquida',
            'step' => 4,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Esta es una opción, pero los puedes hacer a tu gusto',
            'step' => 5,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Seguido coloca la tostada en un plato pando ya para servir',
            'step' => 6,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Encima pon el aguacate y sal pimienta',
            'step' => 7,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Baña con un chorrito de aceite, coloca los huevos ponchados y sal pimienta al gusto',
            'step' => 8,
            'recipe_id' => 123,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 9,
            'recipe_id' => 123,
        ]);

        Instruction::create([
            'name' => 'Preparación berenjena',
            'step' => 1,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Divide la berenjena en dos y retira la pulpa y deja aparte',
            'step' => 2,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'En un tazón pon la pulpa, agrega el aceite de oliva y rosea con pimienta deja conservando ',
            'step' => 3,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'En un sartén con mantequilla a fuego bajo, pon a so fritar el ajo y la cebolla por unos minutos o hasta que esté doradito',
            'step' => 4,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Seguido agrega la pulpa de la berenjena que tenías conservando, trozos de pollo, aceitunas, agrega el caldo y sal pimienta',
            'step' => 5,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Deja cocinar por 10 minutos y cuando esté bien reducido el caldo adiciona el queso crema, la crema agria y revuelve por unos segundos, apaga y tapa.',
            'step' => 6,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Toma nuevamente las berenjenas y rellena cada una con el pollo preparado',
            'step' => 7,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Rocía el perejil y el queso parmesano',
            'step' => 8,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Lleva al horno por 10 minutos o hasta que gratine',
            'step' => 9,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato con nuestra ensalada',
            'step' => 10,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Preparación ensalada',
            'step' => 11,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'En un tazón pon todos los ingredientes menos los tomates, sal pimienta y revuelve muy bien',
            'step' => 12,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Agrega un buen chorro de aceite de oliva, el vinagre y salpimienta nuevamente',
            'step' => 13,
            'recipe_id' => 124,
        ]);
        Instruction::create([
            'name' => 'Al servir coloca los tomates',
            'step' => 14,
            'recipe_id' => 124,
        ]);

        Instruction::create([
            'name' => 'En un sartén con mantequilla y a fuego bajo sofríe el ajo ',
            'step' => 1,
            'recipe_id' => 125,
        ]);
        Instruction::create([
            'name' => 'Añade las espinacas y las salteamos unos minutos',
            'step' => 2,
            'recipe_id' => 125,
        ]);
        Instruction::create([
            'name' => 'Seguido agrega el queso crema, sal pimienta y revuelve por unos minutos más y apaga',
            'step' => 3,
            'recipe_id' => 125,
        ]);
        Instruction::create([
            'name' => 'Coloca en tazas, que puedan ir al horno, las espinacas y le revientas los huevos encima, espolvorea con queso parmesano',
            'step' => 4,
            'recipe_id' => 125,
        ]);
        Instruction::create([
            'name' => 'Lleva al horno por 10 minutos o hasta que esté el huevo al gusto ',
            'step' => 5,
            'recipe_id' => 125,
        ]);
        Instruction::create([
            'name' => 'Sirve de inmediato',
            'step' => 6,
            'recipe_id' => 125,
        ]);



    }
}
