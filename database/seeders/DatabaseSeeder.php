<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(FaseSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(InstructionSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(TipSeeder::class);
        $this->call(WeekSeeder::class);

        # Insertar Días Fase 1
        #INSERT INTO `day_fase` (`id`, `fase_id`, `day_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', CURRENT_TIMESTAMP, NULL), (NULL, '1', '2', CURRENT_TIMESTAMP, NULL), (NULL, '1', '3', CURRENT_TIMESTAMP, NULL), (NULL, '1', '4', CURRENT_TIMESTAMP, NULL), (NULL, '1', '5', CURRENT_TIMESTAMP, NULL), (NULL, '1', '6', CURRENT_TIMESTAMP, NULL), (NULL, '1', '7', CURRENT_TIMESTAMP, NULL), (NULL, '1', '8', CURRENT_TIMESTAMP, NULL), (NULL, '1', '9', CURRENT_TIMESTAMP, NULL), (NULL, '1', '10', CURRENT_TIMESTAMP, NULL), (NULL, '1', '11', CURRENT_TIMESTAMP, NULL), (NULL, '1', '12', CURRENT_TIMESTAMP, NULL), (NULL, '1', '13', CURRENT_TIMESTAMP, NULL), (NULL, '1', '14', CURRENT_TIMESTAMP, NULL), (NULL, '1', '15', CURRENT_TIMESTAMP, NULL), (NULL, '1', '16', CURRENT_TIMESTAMP, NULL), (NULL, '1', '17', CURRENT_TIMESTAMP, NULL), (NULL, '1', '18', CURRENT_TIMESTAMP, NULL), (NULL, '1', '19', CURRENT_TIMESTAMP, NULL), (NULL, '1', '20', CURRENT_TIMESTAMP, NULL), (NULL, '1', '21', CURRENT_TIMESTAMP, NULL);
    
        # Insertar Diás de la semana Fase 1
        #INSERT INTO `day_week` (`id`, `day_id`, `week_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', CURRENT_TIMESTAMP, NULL), (NULL, '2', '1', CURRENT_TIMESTAMP, NULL), (NULL, '3', '1', CURRENT_TIMESTAMP, NULL), (NULL, '4', '1', CURRENT_TIMESTAMP, NULL), (NULL, '5', '1', CURRENT_TIMESTAMP, NULL), (NULL, '6', '1', CURRENT_TIMESTAMP, NULL), (NULL, '7', '1', CURRENT_TIMESTAMP, NULL), (NULL, '8', '2', CURRENT_TIMESTAMP, NULL), (NULL, '9', '2', CURRENT_TIMESTAMP, NULL), (NULL, '10', '2', CURRENT_TIMESTAMP, NULL), (NULL, '11', '2', CURRENT_TIMESTAMP, NULL), (NULL, '12', '2', CURRENT_TIMESTAMP, NULL), (NULL, '13', '2', CURRENT_TIMESTAMP, NULL), (NULL, '14', '2', CURRENT_TIMESTAMP, NULL), (NULL, '15', '3', CURRENT_TIMESTAMP, NULL), (NULL, '16', '3', CURRENT_TIMESTAMP, NULL), (NULL, '17', '3', CURRENT_TIMESTAMP, NULL), (NULL, '18', '3', CURRENT_TIMESTAMP, NULL), (NULL, '19', '3', CURRENT_TIMESTAMP, NULL), (NULL, '20', '3', CURRENT_TIMESTAMP, NULL), (NULL, '21', '3', CURRENT_TIMESTAMP, NULL);

        # Insertar Semanas Fase 1
        #INSERT INTO `fase_week` (`id`, `fase_id`, `week_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', CURRENT_TIMESTAMP, NULL), (NULL, '1', '2', CURRENT_TIMESTAMP, NULL), (NULL, '1', '3', CURRENT_TIMESTAMP, NULL);

        # Insertar Recursos Fase 1
        #INSERT INTO `resources` (`id`, `name`, `url`, `resourceable_id`, `resourceable_type`, `created_at`, `updated_at`) VALUES (NULL, 'Lista de Alimentos Fase 1', 'lista-de-alimentos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL), (NULL, 'Secretos Fase 1', 'secretos-fase-1-dkp.pdf', '1', 'App\\Models\\Fase', CURRENT_TIMESTAMP, NULL);

        # Insertar Plan Fase 1 Prueba
        #INSERT INTO `subscriptions` (`id`, `plan_id`, `user_id`, `created_at`, `updated_at`) VALUES (NULL, '2', '1', CURRENT_TIMESTAMP, NULL);

        #INSERT INTO `fase_plan` (`id`, `fase_id`, `plan_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '2', CURRENT_TIMESTAMP, NULL);

        #INSERT INTO `fase_user` (`id`, `fase_id`, `user_id`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Día 1 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', '1', CURRENT_TIMESTAMP, NULL), (NULL, '1', '2', '2', CURRENT_TIMESTAMP, NULL), (NULL, '1', '3', '3', CURRENT_TIMESTAMP, NULL), (NULL, '1', '4', '4', CURRENT_TIMESTAMP, NULL), (NULL, '1', '5', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 2 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '2', '6', '1', CURRENT_TIMESTAMP, NULL), (NULL, '2', '7', '2', CURRENT_TIMESTAMP, NULL), (NULL, '2', '8', '3', CURRENT_TIMESTAMP, NULL), (NULL, '2', '5', '4', CURRENT_TIMESTAMP, NULL), (NULL, '2', '9', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 3 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '3', '10', '1', CURRENT_TIMESTAMP, NULL),(NULL, '3', '11', '2', CURRENT_TIMESTAMP, NULL), (NULL, '3', '12', '3', CURRENT_TIMESTAMP, NULL), (NULL, '3', '13', '4', CURRENT_TIMESTAMP, NULL), (NULL, '3', '5', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 4 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '4', '14', '1', CURRENT_TIMESTAMP, NULL), (NULL, '4', '15', '2', CURRENT_TIMESTAMP, NULL), (NULL, '4', '16', '3', CURRENT_TIMESTAMP, NULL), (NULL, '4', '17', '4', CURRENT_TIMESTAMP, NULL), (NULL, '4', '5', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 5 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '5', '18', '1', CURRENT_TIMESTAMP, NULL), (NULL, '5', '19', '2', CURRENT_TIMESTAMP, NULL), (NULL, '5', '20', '3', CURRENT_TIMESTAMP, NULL), (NULL, '5', '21', '4', CURRENT_TIMESTAMP, NULL), (NULL, '5', '9', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 6 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '6', '22', '1', CURRENT_TIMESTAMP, NULL), (NULL, '6', '23', '2', CURRENT_TIMESTAMP, NULL), (NULL, '6', '24', '3', CURRENT_TIMESTAMP, NULL), (NULL, '6', '5', '4', CURRENT_TIMESTAMP, NULL), (NULL, '6', '9', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 7 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '7', '25', '1', CURRENT_TIMESTAMP, NULL), (NULL, '7', '26', '2', CURRENT_TIMESTAMP, NULL), (NULL, '7', '27', '3', CURRENT_TIMESTAMP, NULL), (NULL, '7', '4', '4', CURRENT_TIMESTAMP, NULL), (NULL, '7', '28', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 8 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '8', '29', '2', CURRENT_TIMESTAMP, NULL), (NULL, '8', '30', '3', CURRENT_TIMESTAMP, NULL), (NULL, '8', '31', '4', CURRENT_TIMESTAMP, NULL), (NULL, '8', '32', '4', CURRENT_TIMESTAMP, NULL), (NULL, '8', '28', '4', CURRENT_TIMESTAMP, NULL);
        
        # Insertar Recetas Dia 9 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '9', '33', '1', CURRENT_TIMESTAMP, NULL), (NULL, '9', '34', '2', CURRENT_TIMESTAMP, NULL), (NULL, '9', '35', '3', CURRENT_TIMESTAMP, NULL), (NULL, '9', '4', '4', CURRENT_TIMESTAMP, NULL), (NULL, '9', '9', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 10 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '10', '36', '1', CURRENT_TIMESTAMP, NULL), (NULL, '10', '37', '2', CURRENT_TIMESTAMP, NULL), (NULL, '10', '38', '3', CURRENT_TIMESTAMP, NULL), (NULL, '10', '5', '4', CURRENT_TIMESTAMP, NULL), (NULL, '10', '39', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 11 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '11', '40', '1', CURRENT_TIMESTAMP, NULL), (NULL, '11', '41', '2', CURRENT_TIMESTAMP, NULL), (NULL, '11', '42', '3', CURRENT_TIMESTAMP, NULL), (NULL, '11', '43', '4', CURRENT_TIMESTAMP, NULL), (NULL, '11', '44', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 12 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '12', '45', '1', CURRENT_TIMESTAMP, NULL), (NULL, '12', '46', '2', CURRENT_TIMESTAMP, NULL), (NULL, '12', '47', '3', CURRENT_TIMESTAMP, NULL), (NULL, '12', '4', '4', CURRENT_TIMESTAMP, NULL), (NULL, '12', '32', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 13 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '13', '1', '1', CURRENT_TIMESTAMP, NULL), (NULL, '13', '48', '2', CURRENT_TIMESTAMP, NULL), (NULL, '13', '49', '3', CURRENT_TIMESTAMP, NULL), (NULL, '13', '50', '4', CURRENT_TIMESTAMP, NULL), (NULL, '13', '28', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 14 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '14', '51', '1', CURRENT_TIMESTAMP, NULL), (NULL, '14', '52', '2', CURRENT_TIMESTAMP, NULL), (NULL, '14', '53', '3', CURRENT_TIMESTAMP, NULL), (NULL, '14', '54', '4', CURRENT_TIMESTAMP, NULL),(NULL, '14', '43', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 15 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '15', '55', '1', CURRENT_TIMESTAMP, NULL), (NULL, '15', '56', '2', CURRENT_TIMESTAMP, NULL), (NULL, '15', '57', '3', CURRENT_TIMESTAMP, NULL), (NULL, '15', '58', '4', CURRENT_TIMESTAMP, NULL), (NULL, '15', '28', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 16 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '16', '59', '1', CURRENT_TIMESTAMP, NULL), (NULL, '16', '60', '2', CURRENT_TIMESTAMP, NULL), (NULL, '16', '61', '2', CURRENT_TIMESTAMP, NULL), (NULL, '16', '5', '4', CURRENT_TIMESTAMP, NULL), (NULL, '16', '28', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 17 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '17', '62', '1', CURRENT_TIMESTAMP, NULL), (NULL, '17', '63', '2', CURRENT_TIMESTAMP, NULL), (NULL, '17', '64', '3', CURRENT_TIMESTAMP, NULL), (NULL, '17', '4', '4', CURRENT_TIMESTAMP, NULL), (NULL, '17', '28', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 18 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '18', '65', '1', CURRENT_TIMESTAMP, NULL), (NULL, '18', '66', '2', CURRENT_TIMESTAMP, NULL), (NULL, '18', '67', '3', CURRENT_TIMESTAMP, NULL), (NULL, '18', '4', '4', CURRENT_TIMESTAMP, NULL), (NULL, '18', '28', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 19 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '19', '68', '1', CURRENT_TIMESTAMP, NULL), (NULL, '19', '69', '2', CURRENT_TIMESTAMP, NULL), (NULL, '19', '16', '3', CURRENT_TIMESTAMP, NULL), (NULL, '19', '44', '4', CURRENT_TIMESTAMP, NULL), (NULL, '19', '43', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 20 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '20', '70', '1', CURRENT_TIMESTAMP, NULL), (NULL, '20', '71', '2', CURRENT_TIMESTAMP, NULL), (NULL, '20', '72', '3', CURRENT_TIMESTAMP, NULL), (NULL, '20', '4', '4', CURRENT_TIMESTAMP, NULL), (NULL, '20', '28', '4', CURRENT_TIMESTAMP, NULL);

        # Insertar Recetas Dia 21 Fase 1
        #INSERT INTO `day_recipe` (`id`, `day_id`, `recipe_id`, `meal`, `created_at`, `updated_at`) VALUES (NULL, '21', '45', '1', CURRENT_TIMESTAMP, NULL), (NULL, '21', '73', '2', CURRENT_TIMESTAMP, NULL), (NULL, '21', '74', '3', CURRENT_TIMESTAMP, NULL),  (NULL, '21', '4', '4', CURRENT_TIMESTAMP, NULL),  (NULL, '21', '28', '4', CURRENT_TIMESTAMP, NULL);

    }
}
