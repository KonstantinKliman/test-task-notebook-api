<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *     path="/api/v1/notebook",
 *     summary="Создание записи",
 *     tags={"Notebook"},
 *     @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="multipart/form-data",
 *              @OA\Schema(
 *                  @OA\Property(property="fullName", type="string", description="Полное имя", example="fullname"),
 *                  @OA\Property(property="company", type="string", description="Название компании", example="company name"),
 *                  @OA\Property(property="phone", type="string", description="Номер телефона", example="88005553535"),
 *                  @OA\Property(property="email", type="string", description="Электронная почта", format="email", example="email@example.com"),
 *                  @OA\Property(property="dateOfBirth", type="string", description="Дата рождения", format="date", example="2000-01-01"),
 *                  @OA\Property(property="photoUrl", type="string", description="Фото", format="binary"),
 *                  required={"fullName", "phone", "email"}
 *              )
 *          ),
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="fullName", type="string", description="Полное имя", example="fullname"),
 *                  @OA\Property(property="company", type="string", nullable=true, description="Название компании", example="company name"),
 *                  @OA\Property(property="phone", type="string", description="Номер телефона", example="88005553535"),
 *                  @OA\Property(property="email", type="string", description="Электронная почта", format="email", example="email@example.com"),
 *                  @OA\Property(property="dateOfBirth", type="string", nullable=true, description="Дата рождения", format="date", example="2000-01-01"),
 *                  required={"fullName", "phone", "email"}
 *              )
 *           )
 *     ),
 *     @OA\Response(
 *          response=201,
 *          description="Created",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="fullName", type="string", example="fullname"),
 *              @OA\Property(property="company", type="string", example="company name"),
 *              @OA\Property(property="phone", type="string", example="88005553535"),
 *              @OA\Property(property="email", type="string", example="email@example.com"),
 *              @OA\Property(property="dateOfBirth", type="string", example="2000-01-01"),
 *              @OA\Property(property="photoUrl", type="string", example="http://example.com/uploads/photo.jpg")
 *          )
 *     )
 * ),
 * @OA\Get(
 *     path="/api/v1/notebook/{id}",
 *     summary="Получение одной записи",
 *     tags={"Notebook"},
 *     @OA\Parameter(
 *          description="ID записи",
 *          in="path",
 *          name="id",
 *          required=true,
 *          example=1
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="id", type="integer", example="1"),
 *              @OA\Property(property="fullName", type="string", example="fullname"),
 *              @OA\Property(property="company", type="string", nullable=true, example="company name"),
 *              @OA\Property(property="phone", type="string", example="88005553535"),
 *              @OA\Property(property="email", type="string", example="email@example.com"),
 *              @OA\Property(property="dateOfBirth", type="string", nullable=true, example="2000-01-01"),
 *              @OA\Property(property="photoUrl", type="string", nullable=true, example="http://example.com/uploads/photo.jpg")
 *          )
 *     ),
 *     @OA\Response(
 *          response=404,
 *          description="Not Found",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Notebook].")
 *          )
 *     )
 * ),
 * @OA\Post(
 *      path="/api/v1/notebook/{id}",
 *      summary="Изменение записи",
 *      tags={"Notebook"},
 *      @OA\Parameter(
 *          description="ID записи",
 *          in="path",
 *          name="id",
 *          required=true,
 *          example=1
 *      ),
 *      @OA\RequestBody(
 *           @OA\MediaType(
 *               mediaType="multipart/form-data",
 *               @OA\Schema(
 *                   @OA\Property(property="fullName", type="string", description="Полное имя", example="fullname"),
 *                   @OA\Property(property="company", type="string", description="Название компании", example="company name"),
 *                   @OA\Property(property="phone", type="string", description="Номер телефона", example="88005553535"),
 *                   @OA\Property(property="email", type="string", description="Электронная почта", format="email", example="email@example.com"),
 *                   @OA\Property(property="dateOfBirth", type="string", description="Дата рождения", format="date", example="2000-01-01"),
 *                   @OA\Property(property="photoUrl", type="string", description="Фото", format="binary"),
 *                   required={"fullName", "phone", "email"}
 *               )
 *           ),
 *           @OA\MediaType(
 *               mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(property="fullName", type="string", description="Полное имя", example="fullname"),
 *                   @OA\Property(property="company", type="string", nullable=true, description="Название компании", example="company name"),
 *                   @OA\Property(property="phone", type="string", description="Номер телефона", example="88005553535"),
 *                   @OA\Property(property="email", type="string", description="Электронная почта", format="email", example="email@example.com"),
 *                   @OA\Property(property="dateOfBirth", type="string", nullable=true, description="Дата рождения", format="date", example="2000-01-01"),
 *                   required={"fullName", "phone", "email"}
 *               )
 *            ),
 *      ),
 *      @OA\Response(
 *           response=200,
 *           description="Ok",
 *           @OA\JsonContent(
 *               @OA\Property(property="id", type="integer", example="1"),
 *               @OA\Property(property="fullName", type="string", example="fullname"),
 *               @OA\Property(property="company", type="string", example="company name"),
 *               @OA\Property(property="phone", type="string", example="88005553535"),
 *               @OA\Property(property="email", type="string", example="email@example.com"),
 *               @OA\Property(property="dateOfBirth", type="string", example="2000-01-01"),
 *               @OA\Property(property="photoUrl", type="string", example="http://example.com/uploads/photo.jpg")
 *           )
 *      ),
 *      @OA\Response(
 *           response=404,
 *           description="Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Notebook].")
 *           )
 *      )
 *  ),
 * @OA\Delete(
 *      path="/api/v1/notebook/{id}",
 *      summary="Удаление одной записи",
 *      tags={"Notebook"},
 *      @OA\Parameter(
 *           description="ID записи",
 *           in="path",
 *           name="id",
 *           required=true,
 *           example=1
 *      ),
 *      @OA\Response(
 *           response=200,
 *           description="Ok",
 *           @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="Record successfully deleted"),
 *           )
 *      ),
 *      @OA\Response(
 *           response=404,
 *           description="Not Found",
 *           @OA\JsonContent(
 *               @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Notebook].")
 *           )
 *      )
 *  ),
 * @OA\Get(
 *      path="/api/v1/notebook?limit={perPage}",
 *      summary="Получение всех записей",
 *      tags={"Notebook"},
 *      @OA\Parameter(
 *          description="Количество записей на одной странице",
 *          in="path",
 *          name="perPage",
 *          required=true,
 *          example=10
 *      ),
 *      @OA\Response(
 *           response=200,
 *           description="Ok",
 *           @OA\JsonContent(
 *               @OA\Property(property="data", type="array",
 *                  @OA\Items(
 *                      @OA\Property(property="id", type="integer", example="1"),
 *                      @OA\Property(property="fullName", type="string", example="fullname"),
 *                      @OA\Property(property="company", type="string", nullable=true, example="company name"),
 *                      @OA\Property(property="phone", type="string", example="88005553535"),
 *                      @OA\Property(property="email", type="string", example="email@example.com"),
 *                      @OA\Property(property="dateOfBirth", type="string", nullable=true, example="2000-01-01"),
 *                      @OA\Property(property="photoUrl", type="string", nullable=true, example="http://example.com/uploads/photo.jpg")
 *                  )
 *               ),
 *               @OA\Property(property="links", type="object"),
 *               @OA\Property(property="meta", type="object"),
 *           )
 *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad request",
     *          @OA\JsonContent(example={})
     *      ),
 *  ),
 */
class NotebookController extends Controller
{
    //
}
