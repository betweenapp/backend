<?php


namespace Betweenapp\Backend\Tests\Features\Components;


use Betweenapp\Backend\Components\Lists\ListColumnComponent;
use Betweenapp\Backend\Components\Lists\ListComponent;
use Betweenapp\Backend\Exceptions\DuplicatedFormAliasRegistrationException;
use Betweenapp\Backend\Exceptions\DuplicatedListAliasRegistrationException;
use Betweenapp\Backend\Tests\FeatureTestCase;
use Betweenapp\Backend\Facades\BackendComponent;
use Betweenapp\Backend\Components\ComponentManager;
use Betweenapp\Backend\Components\Form\FormRowComponent;
use Betweenapp\Backend\Components\Form\TextInputComponent;

class ComponentManagerTest extends FeatureTestCase
{

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        BackendComponent::flushComponentsRegistration();
    }


    public function test_exists_component_manager_facade()
    {

        $this->assertInstanceOf(ComponentManager::class, BackendComponent::instance());

    }

    public function test_backend_component_can_register_a_form_component()
    {
        BackendComponent::registerFormComponent('ba-text-input', TextInputComponent::class);
        $this->assertCount(1, BackendComponent::getFormComponents());

    }

    public function test_it_throws_an_exception_if_duplicated_alias_form_component_is_registered()
    {
        $this->expectException(DuplicatedFormAliasRegistrationException::class);
        BackendComponent::registerFormComponent('ba-text-input', TextInputComponent::class);
        BackendComponent::registerFormComponent('ba-text-input', FormRowComponent::class);
    }

    public function test_it_can_register_a_list_component()
    {
        BackendComponent::registerListComponent('ba-list-s', ListColumnComponent::class);
        $this->assertCount(1, BackendComponent::getListComponents());
    }

    public function test_it_throws_an_exception_if_duplicated_alias_list_component_is_registered()
    {
        $this->expectException(DuplicatedListAliasRegistrationException::class);
        BackendComponent::registerListComponent('ba-text-input', TextInputComponent::class);
        BackendComponent::registerListComponent('ba-text-input', FormRowComponent::class);
    }

    public function test_make_component_returns_a_instance_of_the_component()
    {
        BackendComponent::registerFormComponent('ba-text-input', TextInputComponent::class);
        $textInputComponent = BackendComponent::makeFormComponent('ba-text-input', []);

        $this->assertInstanceOf(TextInputComponent::class, $textInputComponent);

    }

    public function test_make_component_return_a_json_definition()
    {
        $listDefinition = new ListComponent(
            'azeoni/insurance/insurances',
            __('insurances.insurances'),
            [
            new ListColumnComponent('name', __('insurances.name'), null, [
                'sortable' => true,
                'width' => '200px'
            ])
        ]);
        $this->assertJson($listDefinition->toJson());
    }


}