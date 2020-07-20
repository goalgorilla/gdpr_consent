<?php

namespace Drupal\data_policy;

use Drupal\data_policy\Entity\UserConsentInterface;

/**
 * Defines the Data Policy Consent Manager service interface.
 */
interface DataPolicyConsentManagerInterface {

  /**
   * Check if user gave consent on a current version of data policy.
   *
   * @return bool
   *   TRUE if consent is needed.
   */
  public function needConsent();

  /**
   * Add checkbox to form which allow user give consent on data policy.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   */
  public function addCheckbox(array &$form);

  /**
   * Save user consent.
   *
   * @param int $user_id
   *   The user ID.
   * @param mixed $state
   *   The one of three allowed states:
   *   - undecided,
   *   - not agree,
   *   - agree.
   * @param bool $is_submit
   *   The submit action.
   */
  public function saveConsent($user_id, $state = UserConsentInterface::STATE_UNDECIDED, $is_submit = FALSE);

  /**
   * Check if data policy is created.
   *
   * @return bool
   *   TRUE if data policy entity is created.
   */
  public function isDataPolicy();

  /**
   * Return value from the configuration.
   *
   * @param string $name
   *   The key in config.
   *
   * @return mixed
   *   The value related with key.
   */
  public function getConfig($name);

  /**
   * Get the entity ids from consent text in settings form.
   *
   * @return array
   *   Entity ids.
   */
  public function getEntityIdsFromConsentText();

  /**
   * Get the list of revisions for specific entities.
   *
   * @param array $entity_ids
   *   The list of entity ids.
   *
   * @return array
   *   The list of revisions.
   */
  public function getRevisionsByEntityIds(array $entity_ids);

}
