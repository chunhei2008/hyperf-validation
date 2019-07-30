<?php

namespace Chunhei2008\Hyperf\Validation\Tests\Cases;

use Hyperf\Database\Connection;
use Hyperf\Database\ConnectionResolverInterface;
use Hyperf\Database\Model\Register;
use Hyperf\Database\Schema\Builder;
use Hyperf\Database\Schema\Grammars\MySqlGrammar;
use Hyperf\DbConnection\ConnectionResolver;
use Hyperf\Event\EventDispatcher;
use Hyperf\Utils\ApplicationContext;
use PHPUnit\Framework\TestCase;


//use Illuminate\Database\Capsule\Manager as DB;  //todo

//use Hyperf\DbConnection\Db as DB;
use Chunhei2008\Hyperf\Validation\Validator;
use Chunhei2008\Hyperf\Translation\Translator;
use Chunhei2008\Hyperf\Translation\ArrayLoader;
use Chunhei2008\Hyperf\Validation\Rules\Exists;
use Hyperf\DbConnection\Model\Model as Eloquent;
use Chunhei2008\Hyperf\Validation\DatabasePresenceVerifier;
use Psr\Container\ContainerInterface;
use Mockery as m;
use Psr\EventDispatcher\EventDispatcherInterface;


class ValidationExistsRuleTest extends TestCase
{
    /**
     * Setup the database schema.
     *
     * @return void
     */
    protected function setUp(): void
    {
//        ApplicationContext::setContainer($container = m::mock(ContainerInterface::class));
//     //   $container->
//        $pdo        = new \PDO('sqlite::memory:');
//        $connection = new Connection($pdo);
//        $connection->setSchemaGrammar(new MySqlGrammar());
//
//        $connectionResolver = new \Hyperf\Database\ConnectionResolver([
//            'default' => $connection,
//        ]);
//
//        $container->shouldReceive('get')->once()->with(ConnectionResolver::class)->andReturn($connectionResolver);
//        $container->shouldReceive('get')->once()->with(EventDispatcherInterface::class)->andReturn($dispatchr = m::mock(EventDispatcher::class));
//
//        Register::setConnectionResolver($connectionResolver);
//
//        $this->createSchema();
    }

    public function testItCorrectlyFormatsAStringVersionOfTheRule()
    {
        $rule = new Exists('table');
        $rule->where('foo', 'bar');
        $this->assertEquals('exists:table,NULL,foo,"bar"', (string)$rule);

        $rule = new Exists('table', 'column');
        $rule->where('foo', 'bar');
        $this->assertEquals('exists:table,column,foo,"bar"', (string)$rule);
    }

//    public function testItChoosesValidRecordsUsingWhereInRule()
//    {
//        $rule = new Exists('users', 'id');
//        $rule->whereIn('type', ['foo', 'bar']);
//
//        EloquentTestUser::create(['id' => '1', 'type' => 'foo']);
//        EloquentTestUser::create(['id' => '2', 'type' => 'bar']);
//        EloquentTestUser::create(['id' => '3', 'type' => 'baz']);
//        EloquentTestUser::create(['id' => '4', 'type' => 'other']);
//
//        $trans = $this->getIlluminateArrayTranslator();
//        $v     = new Validator($trans, [], ['id' => $rule]);
//        $v->setPresenceVerifier(new DatabasePresenceVerifier(Register::getConnectionResolver()));
//
//        $v->setData(['id' => 1]);
//        $this->assertTrue($v->passes());
//        $v->setData(['id' => 2]);
//        $this->assertTrue($v->passes());
//        $v->setData(['id' => 3]);
//        $this->assertFalse($v->passes());
//        $v->setData(['id' => 4]);
//        $this->assertFalse($v->passes());
//    }
//
//    public function testItChoosesValidRecordsUsingWhereNotInRule()
//    {
//        $rule = new Exists('users', 'id');
//        $rule->whereNotIn('type', ['foo', 'bar']);
//
//        EloquentTestUser::create(['id' => '1', 'type' => 'foo']);
//        EloquentTestUser::create(['id' => '2', 'type' => 'bar']);
//        EloquentTestUser::create(['id' => '3', 'type' => 'baz']);
//        EloquentTestUser::create(['id' => '4', 'type' => 'other']);
//
//        $trans = $this->getIlluminateArrayTranslator();
//        $v     = new Validator($trans, [], ['id' => $rule]);
//        $v->setPresenceVerifier(new DatabasePresenceVerifier(Register::getConnectionResolver()));
//
//        $v->setData(['id' => 1]);
//        $this->assertFalse($v->passes());
//        $v->setData(['id' => 2]);
//        $this->assertFalse($v->passes());
//        $v->setData(['id' => 3]);
//        $this->assertTrue($v->passes());
//        $v->setData(['id' => 4]);
//        $this->assertTrue($v->passes());
//    }
//
//    public function testItChoosesValidRecordsUsingWhereNotInAndWhereNotInRulesTogether()
//    {
//        $rule = new Exists('users', 'id');
//        $rule->whereIn('type', ['foo', 'bar', 'baz'])->whereNotIn('type', ['foo', 'bar']);
//
//        EloquentTestUser::create(['id' => '1', 'type' => 'foo']);
//        EloquentTestUser::create(['id' => '2', 'type' => 'bar']);
//        EloquentTestUser::create(['id' => '3', 'type' => 'baz']);
//        EloquentTestUser::create(['id' => '4', 'type' => 'other']);
//
//        $trans = $this->getIlluminateArrayTranslator();
//        $v     = new Validator($trans, [], ['id' => $rule]);
//        $v->setPresenceVerifier(new DatabasePresenceVerifier(Register::getConnectionResolver()));
//
//        $v->setData(['id' => 1]);
//        $this->assertFalse($v->passes());
//        $v->setData(['id' => 2]);
//        $this->assertFalse($v->passes());
//        $v->setData(['id' => 3]);
//        $this->assertTrue($v->passes());
//        $v->setData(['id' => 4]);
//        $this->assertFalse($v->passes());
//    }

    protected function createSchema()
    {
        $this->schema('default')->create('users', function ($table) {
            $table->unsignedInteger('id');
            $table->string('type');
        });
    }

    /**
     * Get a schema builder instance.
     *
     * @return Builder
     */
    protected function schema($connection = 'default')
    {
        return $this->connection($connection)->getSchemaBuilder();
    }

    /**
     * Get a database connection instance.
     *
     * @return Connection
     */
    protected function connection($connection = 'default')
    {
        return $this->getConnectionResolver()->connection($connection);
    }

    /**
     * Get connection resolver.
     *
     * @return ConnectionResolverInterface
     */
    protected function getConnectionResolver()
    {
        return Register::getConnectionResolver();
    }

    /**
     * Tear down the database schema.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        $this->schema('default')->drop('users');

        m::close();
    }

    public function getIlluminateArrayTranslator()
    {
        return new Translator(
            new ArrayLoader, 'en'
        );
    }
}

/**
 * Eloquent Models.
 */
class EloquentTestUser extends Eloquent
{
    protected $table      = 'users';
    protected $guarded    = [];
    public    $timestamps = false;
}
